@extends('layouts.app')

@section('custom-styles')

@endsection


<style type="text/css">
    .container{
        max-width: 1401px;
    }
</style>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             @if(Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
                @endif
            <div class="card">
                <div class="card-header"><h2>Dashboard</h2></div>
                    <h1>  Form Lists</h1>
                    <div style="text-align: right;"><a href="{{route('dynamicpage')}}">Add new</a></div>
                <div class="card-body">
                     <table class="table table-bordered" id="dynamicTable" style="width: 100%;">  
                        <thead>
                        <tr>
                            <th>Form name</th>
                            <th>Label name</th>
                            <th>HTML</th>
                            <th>Comments</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(count($data)>0)
                             @foreach($data as $row)
                             <tr> 
                                 <td>{{ $row->form_name }}</td>
                                 <td>{{ $row->label}}</td>
                                 <td>{{ $row->html_field }}</td>
                                 <td>{{ $row->comments }}</td>

                                 <td>
                                  <a href="{{ route('form.show', $row->id) }}" class="label label-success">Show</a>
                                 </td>

                                 <td><a href="{{ route('form.edit', $row->id) }}" class="label label-warning">Edit</a></td>

                                 <td><a href="{{ route('form.delete', $row->rowId) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                             </td>
                                </tr>
                             @endforeach
                         @else
                         <tr>
                            <td colspan="6">No Data Found</td>
                         </tr>
                         @endif
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

</div>
@endsection


