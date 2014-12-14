<html>
  <head>
    {{ HTML::style('assets/css/pdf.css') }}
  </head>
  <body>
    {{ HTML::image('images/tpc_img.png', 'logo', ['height'=>'25%', 'width'=>'25%']) }}
    @if ($period == 1)
      <h1>Weekly Attendance Report</h1>
    @elseif ($period == 2)
      <h1>Monthly Attendance Report</h1>
    @endif
    <table class="report-info" border="0">
      <tr>
        <th>Employee:</th>
        @if ($employee_name == NULL)
          <td>All</td>
        @else
          <td>{{ $employee_name }}</td>
        @endif        
      </tr>
      <tr>
        <th>Department:</th>
        @if ($employee_name == NULL)
          <td>All</td>
        @else
          <td>{{ $employee_name }}</td>
        @endif
      </tr>
      <tr>
        <th>From:</th>
        <td>{{ $from_date }}</td>
      </tr>
      <tr>
        <th>To:</th>
        <td>{{ $to_date }}</td>
      </tr>
    </table>
    <br/>
    <table>
      <tr>
        <th>Employee ID</th>
        <th>Date</th>
        <th>Day</th>
        <th>Clock-in</th>
        <th>Clock-out</th>
        <th>Status</th>
        <th>Remarks</th>
      </tr>
      @foreach ($attendances as $attendance)
      <tr>
        <td>{{ $attendance->employee_id }}</td>
        <td>{{ $attendance->date }}</td>
        <td>{{ $attendance->day }}</td>
        <td>{{ $attendance->clock_in }}</td>
        <td>{{ $attendance->clock_out }}</td>
        <td>{{ $attendance->status }}</td>
        <td>{{ $attendance->remarks }}</td>
      </tr>
      @endforeach
    <table>
  </body>
</html>
