<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8"><script src="https://cdn.tailwindcss.com"></script>
    <title>Knihovna CRUD</title>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-5 text-indigo-600">📚 Správa knih</h1>
        <form action="{{ route('books.store') }}" method="POST" class="grid gap-3 mb-8">
            @csrf
            <input type="text" name="title" placeholder="Název" class="border p-2 rounded" required>
            <input type="text" name="author" placeholder="Autor" class="border p-2 rounded" required>
            <input type="number" name="pages" placeholder="Stran" class="border p-2 rounded" required>
            <button class="bg-indigo-500 text-white py-2 rounded font-bold">Přidat knihu</button>
        </form>
        <hr class="mb-5">
        @foreach($books as $book)
            <div class="flex justify-between items-center mb-3 p-3 bg-gray-50 rounded">
                <div><strong>{{ $book->title }}</strong><br><small>{{ $book->author }}</small></div>
                <form action="{{ route('books.delete', $book) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="text-red-500 font-bold">Smazat</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>