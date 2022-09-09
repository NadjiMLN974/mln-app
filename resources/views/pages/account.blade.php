@extends('layouts.base', ['title' => 'Admin'])
@section('main')
<section class="section-manage-account">
    <div class="grid-container">
        <div class="grid-x align-center">
            <div style="max-width:350px; padding: 25px; border-radius: 5px; box-shadow: 0 0 10px 0 rgb(0 0 0 / 15%);">
                <div style="padding: 25px; "><img src="{{ asset('/images')}}/{{ $user->avatar }}" style="border-radius: 5px;"></div>
                <form>
                    <input type="file" name="avatar">
                    <input type="text" value="{{ $user->name }}">
                    <input type="email" value="{{ $user->email }}">
                    <input class="button" type="submit" value="Modifier">
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section-manage-post">
    <div class="grid-container">
        <div class="grid-x large-up-2">
            <table>
                <thead>
                <tr>
                    <th width="200">Titre</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                    <tr>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->body }}</td>
                        <td>
                            <a class="button" href="">Modifier</a>
                            <a class="button alert" href="{{ route('accountPostDelete', $new->id) }}">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                    <script type="text/javascript">
                        $(function () {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                          });
                          var table = $('.data-table').DataTable({
                              processing: true,
                              serverSide: true,
                              ajax: "{{ route('books.index') }}",
                              columns: [
                                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                  {data: 'title', name: 'title'},
                                  {data: 'author', name: 'author'},
                                  {data: 'action', name: 'action', orderable: false, searchable: false},
                              ]
                          });
                          $('#createNewBook').click(function () {
                              $('#saveBtn').val("create-book");
                              $('#book_id').val('');
                              $('#bookForm').trigger("reset");
                              $('#modelHeading').html("Create New Book");
                              $('#ajaxModel').modal('show');
                          });
                          $('body').on('click', '.editBook', function () {
                            var book_id = $(this).data('id');
                            $.get("{{ route('books.index') }}" +'/' + book_id +'/edit', function (data) {
                                $('#modelHeading').html("Edit Book");
                                $('#saveBtn').val("edit-book");
                                $('#ajaxModel').modal('show');
                                $('#book_id').val(data.id);
                                $('#title').val(data.title);
                                $('#author').val(data.author);
                            })
                         });
                          $('#saveBtn').click(function (e) {
                              e.preventDefault();
                              $(this).html('Save');
                          
                              $.ajax({
                                data: $('#bookForm').serialize(),
                                url: "{{ route('books.store') }}",
                                type: "POST",
                                dataType: 'json',
                                success: function (data) {
                           
                                    $('#bookForm').trigger("reset");
                                    $('#ajaxModel').modal('hide');
                                    table.draw();
                               
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                    $('#saveBtn').html('Save Changes');
                                }
                            });
                          });
                          
                          $('body').on('click', '.deleteBook', function () {
                           
                              var book_id = $(this).data("id");
                              confirm("Are You sure want to delete !");
                            
                              $.ajax({
                                  type: "DELETE",
                                  url: "{{ route('books.store') }}"+'/'+book_id,
                                  success: function (data) {
                                      table.draw();
                                  },
                                  error: function (data) {
                                      console.log('Error:', data);
                                  }
                              });
                          });
                           
                        });
                      </script>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="section-manage-post">
    <div class="grid-container">
        <div class="grid-x large-up-2">
            <table>
                <thead>
                <tr>
                    <th width="200">Titre</th>
                    <th>Description</th>
                    <th>Type de Contrat</th>
                    <th>Publication</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->description }}</td>
                        <td>{{ $job->typeContrat }}</td>
                        <td>{{ $job->published }}</td>
                        <td>
                            <button class="button">Modifier</button>
                            <a class="button alert" href="{{ route('accountJobDelete', $job->id) }}">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection