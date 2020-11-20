@extends('layouts.app')

@section('title')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Category</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="_up" action="{{ route('category.store') }}" method="post">
          @csrf
          <div class="card bg-pink collapsed-card elevation-3">
            <div class="card-header">
              <h3 class="card-title">Create Category</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="_name">Name</label>
                <input type="text" class="form-control" id="_name" name="name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="_description">Description</label>
                <textarea class="form-control" id="_description" name="description" rows="4" placeholder="Enter description ..."></textarea>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-6 mb-1">
                  <button id="_cancel" type="button" class="btn btn-block bg-pink btn-sm elevation-2">Cancel</button>
                </div>
                <div class="col-md-6 mb-1">
                  <button type="submit" class="btn btn-block bg-pink btn-sm elevation-2">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-12">
        <div class="card elevation-2">
          <div class="card-header">
            <h3 class="card-title">List Category</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 250px;">
                <input id="_filter" type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <label for="_filter" class="btn btn-default"><i class="fas fa-search"></i></label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table id="contentTable" class="table table-head-fixed text-nowrap table-striped" style="width: 100%">
              <thead class="text-center">
              <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 50%">Name</th>
                <th style="width: 100%">Description</th>
                <th style="width: 50%">Date</th>
                <th style="width: 50%">Action</th>
              </tr>
              </thead>
              <tbody>
              <template id="template_row">
                <tr id="logData">
                  <td class="id"></td>
                  <td class="name"></td>
                  <td class="description"></td>
                  <td class="date"></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-warning edit" id="#id#" name="#name#">Edit</button>
                      <a href="#id#" class="delete">
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                      </a>
                    </div>
                  </td>
                </tr>
              </template>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('addJs')
  <script>
    const table = document.querySelector("#contentTable")
    const row = document.querySelector('#template_row').content.querySelector("tr");

    $(function () {
      refreshTable()

      $(document).on("click", ".logData .name .description", function () {
        const url = "{{ route('category.update', '#id') }}".replace('#id', $(this).attr('id'));
        $('#_up').attr('action', url);
        $('#_name').attr('value', $(this).attr('name'));
        $('#_name').focus();
        $('#_description').html();
      });

      $('#_cancel').on('click', function () {
        $('#_up').attr('action', "{{ route('category.store') }}");
        $('#_name').attr('value', '');
        $('#_name').focus();
        $('#_description').html();
      });
    });

    function refreshTable(e) {
      if (e) {
        e.preventDefault();
      }
      const filter = document.getElementById('_filter').value;
      fetch("{{ route('category.show', '##filter##') }}".replace("##filter##", filter), {
        method: 'GET',
        headers: {
          Accept: "application/json",
          "X-CSRF-TOKEN": $("input[name='_token']").val()
        }
      }).then(async response => {
        const dataset = await response.json();
        const old_tbody = table.querySelector('tbody');
        const new_tbody = document.createElement('tbody');
        for (let data of dataset) {
          const newRow = row.cloneNode(true);
          newRow.querySelector(".id").innerText = data.id;
          newRow.querySelector(".name").innerText = data.name;
          newRow.querySelector(".description").innerText = data.description;
          newRow.querySelector(".date").innerText = data.date;
          newRow.querySelector(".edit").id = newRow.querySelector(".edit").id.replace("#id#", data.id)
          newRow.querySelector(".edit").name = newRow.querySelector(".edit").name.replace("#name#", data.name)
          newRow.querySelector(".delete").href = newRow.querySelector(".delete").href.replace("#id#", data.id)
          if (old_tbody) {
            old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
          } else {
            table.appendChild(new_tbody);
          }
        }
      }).catch((error) => {
        console.log(error);
      });
    }
  </script>
@endsection