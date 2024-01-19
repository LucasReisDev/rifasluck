@extends('layouts.main')

@section('title', 'RifasLuck')

@section('content')


<link rel="stylesheet" href="/css/style.css">
@if($id != null)

<p>

     Exibindo Id:
     {{ $id }}
</p>
@endif

@endsection
