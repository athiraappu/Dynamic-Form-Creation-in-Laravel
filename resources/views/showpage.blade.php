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
        <div class="col-md-8">
             @if(Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
                @endif
            <div class="card">
                <div class="card-header">Show Form</div>                 
                   <div style="text-align: right;"><a href="{{route('admin.home')}}">Back</a></div>
                   <div class="card-body">
                     <table>
                     	<tr>
                     		<td>{{$data[0]->form_name}}
                     		</td>
                     	</tr>
                     	@foreach($data as $row)     
                     	<tr>
                     		<td style="height: 50px;">{{$row->label}}:-</td>
                     		<td><?php echo $row->html_field; ?></td>
                     	</tr>

                     	@endforeach
                     </table>
                </div>
            </div>
        </div>
    </div>

    

</div>



@endsection


