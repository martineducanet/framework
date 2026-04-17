<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8"><script src="https://cdn.tailwindcss.com"></script>
    <title>Knihovna CRUD</title>
</head>
<body class="bg-gray-100 p-10 font-sans">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
        <h1 class="text-3xl font-extrabold mb-6 text-indigo-700 italic text-center">📚 Moje Knihovna</h1>
        <form action="{{ route('books.store') }}" method="POST" class="bg-indigo-50 p-5 rounded-xl border border-indigo-100 mb-8">
            @csrf
            <div class="grid gap-4">
                <input type="text" name="title" placeholder="Název knihy" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none" required>
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="author" placeholder="Autor" class="p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none" required>
                    <input type="number" name="pages" placeholder="Počet stran" class="p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none" required>
                </div>
                <button type="submit" class="bg-indigo-600 text-white font-bold py-2 rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">Pridat do databáze</button>
            </div>
        </form>
        <div class="space-y-4">
            @foreach($books as $book)
            <div class="flex justify-between items-center p-4 bg-white border border-gray-100 rounded-xl hover:shadow-md transition">
                <div>
                    <h3 class="font-bold text-gray-800">{{ $book->title }}</h3>
                    <p class="text-sm text-gray-500">{{ $book->author }} • {{ $book->pages }} stran</p>
                </div>
                <form action="{{ route('books.delete', $book) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="text-red-400 hover:text-red-600 font-semibold p-2">Smazat</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>