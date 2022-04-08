@foreach ($result->result() as $row)
    @if ($row->kategori == 'b')
    <p>
        Kategori => {{ $row->kategori }}
    </p>
    <h2>
        data => {{ $row->title }}
    </h2>
    @endif
    @if ($row->kategori == 'a')
    <p>
        Kategori => {{ $row->kategori }}
    </p>
    <h1>
        data => {{ $row->title }}
    </h1>
    @endif
@endforeach