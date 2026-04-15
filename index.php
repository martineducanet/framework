<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Knihovna</title>
</head>
<body class="bg-slate-50 p-10 font-sans text-slate-800">
    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-indigo-600">📚 Moje Knihovna</h1>

        <form action="ulozit.php" method="POST" class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 mb-10">
            <div class="grid gap-4">
                <input type="text" name="nazev" placeholder="Název knihy" class="w-full border p-2 rounded-lg outline-indigo-500" required>
                <input type="text" name="autor" placeholder="Autor" class="w-full border p-2 rounded-lg outline-indigo-500" required>
                <input type="number" name="strany" placeholder="Počet stran" class="w-full border p-2 rounded-lg outline-indigo-500" required>
                <button type="submit" class="bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Uložit do databáze</button>
            </div>
        </form>

        <div class="space-y-3">
            <?php
            $query = $db->query("SELECT * FROM knihy");
            while ($row = $query->fetchArray(SQLITE3_ASSOC)): ?>
                <div class="bg-white p-4 rounded-lg shadow-sm border border-slate-100 flex justify-between items-center">
                    <div>
                        <h2 class="font-bold"><?= $row['nazev'] ?></h2>
                        <p class="text-sm text-slate-500"><?= $row['autor'] ?> (<?= $row['strany'] ?> str.)</p>
                    </div>
                    <a href="smazat.php?id=<?= $row['id'] ?>" class="text-red-500 text-sm hover:underline font-medium">Smazat</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>