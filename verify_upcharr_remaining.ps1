param(
  [string]$Root = "c:\xampp\htdocs\upchar",
  [string]$Needle = "upcharr.com"
)

$exts = @(".php",".html",".htm",".css",".js",".txt",".xml",".json",".md")
$files = Get-ChildItem -Path $Root -Recurse -File -ErrorAction SilentlyContinue | Where-Object {
  $exts -contains $_.Extension
}

$paths = @($files.FullName)
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

Write-Host ("Remaining files containing '{0}': {1}" -f $Needle, $hitSet.Count)
foreach ($p in ($hitSet.Keys | Sort-Object)) {
  Write-Host $p
}

