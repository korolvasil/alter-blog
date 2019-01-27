@extends('layouts.app')
@section('content')
    @php
        /** @var \App\Models\BlogCategory $category */
        /** @var \Illuminate\Support\Collection $categories */
    @endphp
    <form action="{{ route('blog.admin.categories.update', $category) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item">
                                <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Main</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="maindata" class="tab-pane active" role="tabpanel">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title"
                                           value="{{ $category->title }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug"
                                           value="{{ $category->slug }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Parent</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="" disabled selected>Select parent category</option>
                                        @foreach($categories as $parentCategory)
                                            <option value="{{ $parentCategory->id }}"
                                                    @if($parentCategory->id == $category->parent_id) selected @endif>
                                                id:{{ $parentCategory->id }} || {{ $parentCategory->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                              class="form-control">
                                        {{ $category->description }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
                @if($category->exists)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <p>ID:{{ $category->id }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="created_at">Created</label>
                                <input type="text" id="created_at" name="created_at"
                                       value="{{ $category->created_at }}"
                                       class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Updated</label>
                                <input type="text" id="updated_at" name="updated_at"
                                       value="{{ $category->updated_at }}"
                                       class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="deleted_at">Deleted</label>
                                <input type="text" id="deleted_at" name="deleted_at"
                                       value="{{ $category->deleted_at }}"
                                       class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection