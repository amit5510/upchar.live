param(
  [string]$Root = "c:\xampp\htdocs\upchar",
  [string]$OldDomain = "upcharr.com",
  [string]$NewDomain = "upchar.shop"
)

$extensions = @("*.php","*.html","*.htm","*.css","*.js","*.txt","*.xml","*.json","*.md")
$extensionSet = @(".php",".html",".htm",".css",".js",".txt",".xml",".json",".md")

function Get-HitFiles {
  param(
    [string]$RootPath,
    [string]$Needle
  )

  $files = Get-ChildItem -Path $RootPath -Recurse -File -ErrorAction SilentlyContinue | Where-Object {
    $extensionSet -contains $_.Extension
  }

  # Select-String -Path needs actual file paths; do it in chunks.
  $paths = $files.FullName
  $chunkSize = 500
  $hitSet = @{}

  for ($i = 0; $i -lt $paths.Count; $i += $chunkSize) {
    $end = [Math]::Min($i + $chunkSize - 1, $paths.Count - 1)
    $batch = $paths[$i..$end]
    $matches = Select-String -Path $batch -Pattern $Needle -SimpleMatch -List -ErrorAction SilentlyContinue
    foreach ($m in $matches) {
      $hitSet[$m.Path] = $true
    }
  }

  return ,$hitSet.Keys
}

$hitFiles = Get-HitFiles -RootPath $Root -Needle $OldDomain

$changed = New-Object System.Collections.Generic.List[string]
$replacedCounts = @{}

foreach ($file in $hitFiles) {
  $raw = Get-Content -Path $file -Raw -ErrorAction SilentlyContinue
  if ($null -eq $raw) { continue }

  $escaped = [regex]::Escape($OldDomain)
  $count = ([regex]::Matches($raw, $escaped)).Count
  if ($count -le 0) { continue }

  $backup = "$file.bak"
  if (-not (Test-Path $backup)) {
    Copy-Item -Path $file -Destination $backup -Force
  }

  $updated = $raw -replace $escaped, $NewDomain
  Set-Content -Path $file -Value $updated -Encoding UTF8

  $changed.Add($file) | Out-Null
  $replacedCounts[$file] = $count
}

Write-Host "Changed files: $($changed.Count)"
foreach ($p in $changed) {
  Write-Host ("- {0} (replaced {1} occurrence(s))" -f $p, $replacedCounts[$p])
}

