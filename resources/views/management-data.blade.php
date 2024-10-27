<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Management-Data</title>
</head>
<body>
  <a href="/">Dashboard</a>
  <a href="/management-data">Management-Data</a>
  <br>
  <br>


  <a href="/add-data">Tambah Data</a>
  <table border="1">
    <thead>
      <th>No</th>
      <th>Judul</th>
      <th>Genre</th>
      <th>Publisher</th>
      <th>Developerr</th>
      <th>Tanggal Rilis</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      @if (empty($allData[0]))
        <tr>
          <td colspan="6">Data Tidak Di Temukan</td>
        </tr>
      @else
        <?= $no = 1; ?>
        @foreach ($allData as $data)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->genre }}</td>
            <td>{{ $data->publisher }}</td>
            <td>{{ $data->developer }}</td>
            <td>{{ $data->release_date }}</td>
            <td>
              <a href="/edit-data/{{ $data->id }}">Edit Data</a>
              <form action="/delete-data/{{ $data->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>

</body>
</html>
