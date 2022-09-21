<div class="container">

    <div class="row justify-content-center">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h2>Register new Breakdown</h2>

                </div>

                <div class="card-body">
                        <select name="mechanic_id" class="form-select mt-3">
                            <option value="0">Choose mechanic</option>
                            @foreach($mechanics as $mechanic)
                            <option value="{{$mechanic->id}}">{{$mechanic->name}} {{$mechanic->surname}}</option>
                            @endforeach
                        </select>

                </div>

            </div>

        </div>

    </div>

</div>
