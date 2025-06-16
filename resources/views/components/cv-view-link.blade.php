@if ($record?->cv_path)
<a href="{{ asset($record->cv_path) }}" target="_blank" style="color: #3b82f6; text-decoration: underline;">
    View CV
</a>
@else
<span>No CV uploaded.</span>
@endif