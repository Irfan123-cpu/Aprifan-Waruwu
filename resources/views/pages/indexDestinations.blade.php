@extends('master')

@section('content')

<a href="/destination/create" ><button class="btn btn-success">Add Destination</button></a>


        <div class="container">
            <table class="table table-striped">
                <thread>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Working Hours</th>
                        <th>Working Days</th>
                        <th>Ticket Price</th>
                        <th>Action</th>
                    </tr>
                </thread>
                <tbody>
                    @foreach($destinations as $d)
                    <tr>
                        <td><a href="/destinations/{{ $d->id }}">{{ $d->id }}</a></td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->location }}</td>
                        <td>{{ $d->working_hours }}</td>
                        <td>{{ $d->working_days }}</td>
                        <td>{{ $d->ticket_price }}</td>
                        <td>
                            <a href="/destinations/{{$d->id}}" method="get" class="btn btn-info btn-sm">View</a>
                            <a href="/destinations/{{$d->id}}/edit" method="get" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/destinations/{{ $d->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete ({{ $d->name }})?')">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       
@endsection
     