 <div class="row">
    <div class="col-sm-12 col-lg-12">
      <h4>
        <strong><i class="fa fa-calendar-o"></i> Employee Roster</strong>
      <!-- </h4> -->
        <!-- <span style="float: right">
        {{ Form::open(array('action' => 'EmployeesController@search')) }}
          {{ Form::text('keyword', null, array('placeholder'=>'Search', 'class' => 'form-control')) }} -->
          <!-- {{ Form::submit('search', array('style' => 'display:inline')) }} -->
        <!-- {{ Form::close() }}-->
      <!-- </span> -->
      <!-- <ol class="breadcrumb">
	      <li class="active">Employee Roster</li>
	      <div style="float:right;"><a href="{{ action('RostersController@index') }}" class="btn btn-info btn-xs">
	        <i class="fa fa-calendar-o"></i> </a>
	      </div>
	    </ol> -->
	    <div class="btn-group" role="group" style="float:right">
	    	{{ HTML::linkRoute('rosters.create', 'Create Roster', null, ['class'=>"btn btn-default"]) }}
	    	{{ HTML::linkRoute('rosters.show', 'View Roster', null, ['class'=>"btn btn-default"]) }}
	    	{{ HTML::linkRoute('rosters.edit', 'Edit Roster', null, ['class'=>"btn btn-default"]) }}
			</div></h4>
	  </div>
	</div>