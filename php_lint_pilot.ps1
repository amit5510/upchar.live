param(
  [string]$BaseDir = "c:\xampp\htdocs\upchar",
  # If <= 0, lint all PHP files under BaseDir.
  [int]$Limit = 0,
  [string]$PhpExe = "C:\xampp\php\php.exe",
  [string]$ErrFile = "php_lint_pilot_errors.txt"
)

$filesQuery = Get-ChildItem -Path $BaseDir -Recurse -Filter '*.php' -ErrorAction SilentlyContinue
$total = $filesQuery.Count
if ($Limit -gt 0) {
  $files = $filesQuery | Select-Object -First $Limit
} else {
  $files = $filesQuery
}

if (Test-Path $ErrFile) {
  Remove-Item $ErrFile -Force
}

$checked = 0
foreach ($f in $files) {
  $checked++
  if (($checked % 500) -eq 0) {
    Write-Host ("Checked {0}/{1}..." -f $checked, $total)
  }
  $out = & $PhpExe -l $f.FullName 2>&1
  $outText = [string]$out

  # php -l returns a non-zero exit code on real parse errors.
  if ($LASTEXITCODE -ne 0) {
    Add-Content -Path $ErrFile -Value ("----" + $f.FullName + "`n" + $outText + "`n")
  }
}

$errorCount = 0
if (Test-Path $ErrFile) {
  $errorCount = (Select-String -Path $ErrFile -Pattern '^----' -AllMatches).Matches.Count
}

[pscustomobject]@{
  Checked = $checked
  ErrorCount = $errorCount
  ErrorFile = $ErrFile
}
