@extends('layouts.app')

@section('title', 'Create New Project')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: #2c3e50; font-size: 24px;">Create New Project</h2>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">← Back to List</a>
    </div>

    <div style="background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">Project Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                @error('name')
                    <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="description" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">Project Description *</label>
                <textarea name="description" id="description" rows="5" required
                          style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; resize: vertical;">{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="status" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">Project Status *</label>
                <select name="status" id="status" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="deleted" {{ old('status') === 'deleted' ? 'selected' : '' }}>Deleted</option>
                </select>
                @error('status')
                    <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label for="responsible_person_first_name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">First Name *</label>
                    <input type="text" name="responsible_person_first_name" id="responsible_person_first_name" value="{{ old('responsible_person_first_name') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    @error('responsible_person_first_name')
                        <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="responsible_person_last_name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">Last Name *</label>
                    <input type="text" name="responsible_person_last_name" id="responsible_person_last_name" value="{{ old('responsible_person_last_name') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    @error('responsible_person_last_name')
                        <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label for="start_date" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">Start Date *</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    @error('start_date')
                        <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="end_date" style="display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50;">End Date *</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
                    @error('end_date')
                        <span style="color: #e74c3c; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 30px;">
                <button type="submit" class="btn btn-success" style="flex: 1;">Create Project</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary" style="flex: 1; text-align: center;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection