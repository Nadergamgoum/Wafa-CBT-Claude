<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><title>New enquiry</title></head>
<body style="margin:0;padding:24px;background:#f4f6f8;font-family:Arial,Helvetica,sans-serif;color:#0e1f2d">
<table role="presentation" width="100%" style="max-width:620px;margin:0 auto;background:#fff;border-radius:12px;border:1px solid #dfe5e9">
<tr><td style="padding:24px 28px;border-bottom:1px solid #dfe5e9">
<p style="margin:0;font-size:13px;color:#4a5b69;text-transform:uppercase;letter-spacing:.08em">{{ \App\Models\Lead::TYPES[$lead->type] ?? 'Enquiry' }}</p>
<h1 style="margin:6px 0 0;font-size:22px">{{ $lead->name }}@if($lead->company) — {{ $lead->company }}@endif</h1>
</td></tr>
<tr><td style="padding:20px 28px">
<table role="presentation" width="100%" style="font-size:15px;line-height:1.6">
<tr><td style="color:#4a5b69;width:140px">Email</td><td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td></tr>
@if ($lead->phone)<tr><td style="color:#4a5b69">Phone</td><td>{{ $lead->phone }}</td></tr>@endif
@if ($lead->service)<tr><td style="color:#4a5b69">Interest</td><td>{{ $lead->service }}</td></tr>@endif
<tr><td style="color:#4a5b69">Language</td><td>{{ strtoupper($lead->locale) }}</td></tr>
@if ($lead->page_url)<tr><td style="color:#4a5b69">Page</td><td>{{ $lead->page_url }}</td></tr>@endif
<tr><td style="color:#4a5b69">Received</td><td>{{ $lead->created_at?->format('Y-m-d H:i') }}</td></tr>
</table>
@if ($lead->message)
<p style="margin:18px 0 6px;color:#4a5b69;font-size:13px;text-transform:uppercase;letter-spacing:.08em">Message</p>
<div style="white-space:pre-wrap;font-size:15px;line-height:1.6;background:#f7f9fa;border-radius:8px;padding:14px">{{ $lead->message }}</div>
@endif
<p style="margin:22px 0 0"><a href="{{ url('/admin/leads/'.$lead->id) }}" style="display:inline-block;background:#0e7f75;color:#fff;text-decoration:none;padding:10px 18px;border-radius:999px;font-weight:bold">Open in admin</a></p>
</td></tr>
</table>
</body></html>
