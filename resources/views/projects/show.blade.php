@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div style="max-width: 900px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: #2c3e50; font-size: 24px;">Project Details</h2>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">← Back to List</a>
    </div>

    <div style="background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="border-bottom: 2px solid #3498db; padding-bottom: 15px; margin-bottom: 25px;">
            <h3 style="color: #2c3e50; font-size: 28px; margin-bottom: 10px;">{{ $project->name }}</h3>
            <div style="display: inline-block;">
                @if($project->status === 'active')
                    <span style="background-color: #27ae60; color: white; padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;">Active</span>
                @elseif($project->status === 'completed')
                    <span style="background-color: #3498db; color: white; padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;">Completed</span>
                @else
                    <span style="background-color: #e74c3c; color: white; padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;">Deleted</span>
                @endif
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <h4 style="color: #34495e; font-size: 16px; margin-bottom: 10px; font-weight: 600;">Description</h4>
            <p style="color: #555; line-height: 1.8; font-size: 15px; background-color: #f8f9fa; padding: 15px; border-radius: 4px; border-left: 4px solid #3498db;">
                {{ $project->description }}
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px;">
            <div style="background-color: #ecf0f1; padding: 20px; border-radius: 8px;">
                <h4 style="color: #34495e; font-size: 14px; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Project ID</h4>
                <p style="color: #2c3e50; font-size: 18px; font-weight: 600;">#{{ $project->id }}</p>
            </div>

            <div style="background-color: #ecf0f1; padding: 20px; border-radius: 8px;">
                <h4 style="color: #34495e; font-size: 14px; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Responsible Person</h4>
                <p style="color: #2c3e50; font-size: 18px; font-weight: 600;">{{ $project->responsible_person_full_name }}</p>
            </div>
        </div>

        <div style="display: grid;  gap: 25px; margin-bottom: 30px;">
            <div style="background-color: #e8f5e9; padding: 20px; border-radius: 8px; border-left: 4px solid #27ae60;">
                <h4 style="color: #27ae60; font-size: 14px; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Start Date</h4>
                <p style="color: #2c3e50; font-size: 18px; font-weight: 600;">{{ $project->start_date->format('d M, Y') }}</p>
                <p style="color: #7f8c8d; font-size: 13px; margin-top: 5px;">{{ $project->start_date->diffForHumans() }}</p>
            </div>

            <div style="background-color: #ffebee; padding: 20px; border-radius: 8px; border-left: 4px solid #e74c3c;">
                <h4 style="color: #e74c3c; font-size: 14px; margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">End Date</h4>
                <p style="color: #2c3e50; font-size: 18px; font-weight: 600;">{{ $project->end_date->format('d M, Y') }}</p>
                <p style="color: #7f8c8d; font-size: 13px; margin-top: 5px;">{{ $project->end_date->diffForHumans() }}</p>
            </div>
        </div>

        <div style="background-color: #f8f9fa; padding: 15px 20px; border-radius: 4px; margin-bottom: 30px;">
            <p style="color: #7f8c8d; font-size: 13px; margin: 0;">
                <strong>Duration:</strong> {{ $project->start_date->diffInDays($project->end_date) }} days
                <span style="margin: 0 10px;">•</span>
                <strong>Created:</strong> {{ $project->created_at->format('d M, Y') }}
                <span style="margin: 0 10px;">•</span>
                <strong>Last Updated:</strong> {{ $project->updated_at->format('d M, Y') }}
            </p>
        </div>

        <div style="display: flex; gap: 10px;">
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning" style="flex: 1; text-align: center;">Edit Project</a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="width: 100%;">Delete Project</button>
            </form>
        </div>
    </div>
</div>
@endsection