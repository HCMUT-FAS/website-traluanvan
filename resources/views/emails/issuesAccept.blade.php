@component('mail::message')
# Bạn đã mượn thành công luận văn

Thời gian bạn mượn luận văn là {{ $dates['currentDate'] ?? ''}}, hãy vui lòng trả lại trước {{ $dates['expectedDate'] ?? '' }}.

Xin cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
