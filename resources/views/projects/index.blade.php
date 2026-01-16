@extends('layouts.app')

@section('title', 'Projects List')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2 style="color: #2c3e50; font-size: 24px;">All Projects</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-success">+ Create New Project</a>
</div>

@if($projects->isEmpty())
    <div style="background-color: white; padding: 40px; text-align: center; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <p style="color: #7f8c8d; font-size: 18px;">No projects found. Create your first project!</p>
        <a href="{{ route('projects.create') }}" class="btn btn-primary" style="margin-top: 20px;">Create Project</a>
    </div>
@else
    <div style="background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #34495e; color: white;">
                    <th style="padding: 15px; text-align: left;">ID</th>
                    <th style="padding: 15px; text-align: left;">Project Name</th>
                    <th style="padding: 15px; text-align: left;">Status</th>
                    <th style="padding: 15px; text-align: left;">Responsible Person</th>
                    <th style="padding: 15px; text-align: left;">Start Date</th>
                    <th style="padding: 15px; text-align: left;">End Date</th>
                    <th style="padding: 15px; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr style="border-bottom: 1px solid #ecf0f1;">
                        <td style="padding: 15px;">{{ $project->id }}</td>
                        <td style="padding: 15px; font-weight: 600;">{{ $project->name }}</td>
                        <td style="padding: 15px;">
                            @if($project->status === 'active')
                                <span style="background-color: #27ae60; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">Active</span>
                            @elseif($project->status === 'completed')
                                <span style="background-color: #3498db; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">Completed</span>
                            @else
                                <span style="background-color: #e74c3c; color: white; padding: 4px 12px; border-radius: 12px; font-size: 12px;">Deleted</span>
                            @endif
                        </td>
                        <td style="padding: 15px;">{{ $project->responsible_person_full_name }}</td>
                        <td style="padding: 15px;">{{ $project->start_date->format('d/m/Y') }}</td>
                        <td style="padding: 15px;">{{ $project->end_date->format('d/m/Y') }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary" style="font-size: 12px; padding: 6px 12px;">View</a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning" style="font-size: 12px; padding: 6px 12px;">Edit</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="font-size: 12px; padding: 6px 12px;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection