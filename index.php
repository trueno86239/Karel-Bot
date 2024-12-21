<?php

session_start();
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, 10, array_fill(0, 10, ''));
    $_SESSION['karel'] = ['x' => 0, 'y' => 0, 'dir' => 'E'];
}

$commands = $_POST['commands'] ?? null;

if ($commands) {
    $x = &$_SESSION['karel']['x'];
    $y = &$_SESSION['karel']['y'];
    $dir = &$_SESSION['karel']['dir'];
    $grid = &$_SESSION['grid'];

    $commandsArray = preg_split('/\r\n|\r|\n/', trim($commands));
    foreach ($commandsArray as $command) {
        $command = trim($command);

        if (preg_match('/^(krok|vlevobok|poloz|reset)(?:\s+(.+))?$/i', $command, $matches)) {
            $action = strtolower($matches[1]);
            $argument = $matches[2] ?? null;
            $repeat = is_numeric($argument) ? (int)$argument : 1;

            if ($action === 'krok') {
                for ($i = 0; $i < $repeat; $i++) {
                    if ($dir === 'n' && $y > 0) $y--;
                    if ($dir === 's' && $y < 9) $y++;
                    if ($dir === 'e' && $x < 9) $x++;
                    if ($dir === 'w' && $x > 0) $x--;
                }
            } elseif ($action === 'vlevobok') {
                for ($i = 0; $i < $repeat; $i++) {
                    $dir = $dir === 'n' ? 'w' : ($dir === 'w' ? 's' : ($dir === 's' ? 'e' : 'n'));
                }
            } elseif ($action === 'poloz') {
                $grid[$y][$x] = $argument ?: '';
            } elseif ($action === 'reset') {
                $_SESSION['grid'] = array_fill(0, 10, array_fill(0, 10, ''));
                $_SESSION['karel'] = ['x' => 0, 'y' => 0, 'dir' => 'e'];
                break;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Karel</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 40px; height: 40px; text-align: center; vertical-align: middle; border: 1px solid black; }
        .karel { background-color: lightblue; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Robot Karel</h1>
    <form method="post" style="text-align: center;">
        <textarea name="commands" rows="10" cols="50" placeholder="Zadejte příkazy, každý na nový řádek (např. krok 5, vlevobok, poloz A, reset)"></textarea><br>
        <button type="submit">Spustit</button>
    </form>
    <table>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++): ?>
                    <td class="<?= $_SESSION['karel']['x'] == $j && $_SESSION['karel']['y'] == $i ? 'karel' : '' ?>"
                        style="background-color: <?= !empty($_SESSION['grid'][$i][$j]) ? htmlspecialchars($_SESSION['grid'][$i][$j]) : ''; ?>;">
                        <?= $_SESSION['grid'][$i][$j] !== '' ? htmlspecialchars($_SESSION['grid'][$i][$j]) : '' ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>
