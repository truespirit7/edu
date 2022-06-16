@extends('layouts.admin_layout')
@section('title', 'Добавить тест')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить тест</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('message') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="card card-primary">
                     <!-- form start -->
                     <form action="{{ route('test.store') }}" method="POST" enctype="multipart/form-data" >
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Название</label>
                                 <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                        placeholder="Введите название теста" required>
                             </div>
                             <div class="form-group">
                                 <label>Выберите пост</label>
                                 <select name="post_id" class="form-control" required>
                                     @foreach ($posts as $post)
                                         <option value="{{ $post['id'] }}">{{ $post['title'] }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group" required>
                                 <label>Вопрос 1</label>
                                 <textarea id="text" name="question_text1" class="editor" cols="30" rows="15"></textarea>
                             </div>
                             <label>Правильный ответ</label>
                             <div class="form-group" required>
                                 <textarea id="text" name="answer1_question1" cols="30" rows="1" maxlength="150"></textarea>

                             </div>
                             <label>Неправильный ответ</label>
                             <div class="form-group" required>
                                 <textarea id="text" name="answer2_question1" cols="30" rows="1" maxlength="150"></textarea>

                             </div>
                             <div class="form-group" required>
                                 <label>Объяснение</label>
                                 <textarea id="text" name="explanation1" class="editor" cols="30" rows="15"></textarea>
                             </div>

                         </div>
                         <!-- /.card-body -->

                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Добавить</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
@endsection
