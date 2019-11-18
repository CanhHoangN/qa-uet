<div class="filter-question">
    <div class="row up-filter">
        <div class="col-md-4">
            <h3>Session & Survey</h3>
        </div>
        <div class="col-md-8 filter">
            <div class="el-filter">
                <label>Filter session by:   </label>
                <label id="category">
                    <select class="form-control" id="sel1" name="sellist1">
                        <option><a href="">default</a></option>
                        <option><a href="">view asc</a></option>
                        <option><a href="">view desc</a></option>
                        <option><a href="">question asc </a></option>
                        <option><a href="">question desc </a></option>
                    </select>
                </label>

            </div>
        </div>
    </div>
    <div class="row down-amount">
        <div class="col-md-4 state-question-pre">
            <ul class="state-question">
                <li><a href="{{route('home')}}">Session</a></li>
                <li><a href="{{route('survey')}}">Survey</a></li>
                <li><a href="{{route('un_question')}}">Un-question</a></li>

            </ul>
        </div>
        <div class="col-md-8 amount-question">
            <div class="el-amount-question">
                <label>Questions Per Page: </label>
                <label id="amount">
                        <div class="form-group">
                            <select class="form-control" id="sel3" name="sellist3">
                                <option><a href="#">all</a></option>
                                <option><a href="#">5</a></option>
                                <option><a href="#">10</a></option>
                                <option><a href="#">15</a></option>
                            </select>
                        </div>
                        <!--  <button type="submit" class="btn btn-primary">Submit</button>-->
                </label>
            </div>

        </div>
    </div>
</div>
