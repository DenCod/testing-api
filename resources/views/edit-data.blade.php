<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Data</title>
</head>
<body>
  <form action="/save-data" method="POST">
    @csrf

    <label for="title">Judul</label>
    <input type="text" name="title" id="title" value="{{ old('title', $data->title) }}">
    <br>

    <label for="genre">Genre</label>
    <select name="genre" id="genre">
      <option selected disabled>-- Pilih Genre --</option>
      <option {{ (old('genre', $data->genre) == 'MMORPG') ? 'selected' : '' }} value="MMORPG">MMORPG</option>
      <option {{ (old('genre', $data->genre) == 'Shooter') ? 'selected' : '' }} value="Shooter">Shooter</option>
      <option {{ (old('genre', $data->genre) == 'MOBA') ? 'selected' : '' }} value="MOBA">MOBA</option>
      <option {{ (old('genre', $data->genre) == 'Anime') ? 'selected' : '' }} value="Anime">Anime</option>
      <option {{ (old('genre', $data->genre) == 'Battle Royale') ? 'selected' : '' }} value="Battle Royale">Battle Royale</option>
      <option {{ (old('genre', $data->genre) == 'Strategy') ? 'selected' : '' }} value="Strategy">Strategy</option>
      <option {{ (old('genre', $data->genre) == 'Fantasy') ? 'selected' : '' }} value="Fantasy">Fantasy</option>
      <option {{ (old('genre', $data->genre) == 'Sci-Fi') ? 'selected' : '' }} value="Sci-Fi">Sci-Fi</option>
      <option {{ (old('genre', $data->genre) == 'Card Games') ? 'selected' : '' }} value="Card Games">Card Games</option>
      <option {{ (old('genre', $data->genre) == 'Racing') ? 'selected' : '' }} value="Racing">Racing</option>
      <option {{ (old('genre', $data->genre) == 'Fighting') ? 'selected' : '' }} value="Fighting">Fighting</option>
      <option {{ (old('genre', $data->genre) == 'Social') ? 'selected' : '' }} value="Social">Social</option>
      <option {{ (old('genre', $data->genre) == 'Sports') ? 'selected' : '' }} value="Sports">Sports</option>
    </select>
    <br>

    <label for="publisher">Publisher</label>
    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $data->publisher) }}">
    <br>

    <label for="developer">Developer</label>
    <input type="text" name="developer" id="developer" value="{{ old('developer', $data->developer) }}">
    <br>

    <label for="release_date">Tanggal Rilis</label>
    <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $data->release_date) }}">
    <br>

    <button type="submit">Tambah</button>

  </form>
</body>
</html>