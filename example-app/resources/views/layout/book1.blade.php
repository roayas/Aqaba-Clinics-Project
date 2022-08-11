

<form method='post' action='book1'>
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Choose the date of the appointment </label>
    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input" name='date'>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Choose the clinic</label>
    <select class="custom-select" id="inputGroupSelect01" name='clinic'>
    <option selected>Choose...</option>
    <!-- <option value="1">One</option> -->
    @foreach($data as $i)
    <option value="{{$i->id}}">{{$i->clinic_name}}</option>
    @endforeach
  </select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">next</button>
</form>

<div>
@if(session('data1'))

{{ session('data1') }}
{{ session('data2->time_end') }}

@endif

</div>