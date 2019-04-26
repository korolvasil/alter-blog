@extends('layouts.app')
@section('content')
    @php
        /** @var \App\Models\BlogCategory $category */
        /** @var \Illuminate\Support\Collection $categories */
    @endphp

    @if ($errors->any())
        <div class="alert alert-danger" style="display: flex;justify-content: space-between;align-items: baseline;">
            <div>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            <button type="button" class="close" data-dismiss = "alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
    @endif
    {{--
        <form action="{{route('blog.admin.categories.destroy', $category->id)}}" method="post">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    --}}
    @include('blog.admin.categories.partials.form')
@endsection