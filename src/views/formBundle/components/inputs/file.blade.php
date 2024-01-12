@isset($inputObject)


{{--    <label for="{{ $inputObject['id'] }}" class="level-card-preview">--}}
{{--        <div--}}
{{--            style="display: flex; flex-direction: column; align-items: center;justify-content: center; margin: 25px; background-color: #F0F0F0; border-radius:14px; border:2px #888 dashed; outline: 8px #F0F0F0 solid">--}}
{{--            <span>فایل خود را در این قسمت بارگزاری کنید.</span>--}}

{{--            <h6 id="after_selection" style="display: grid; text-align: center">--}}
{{--                <span class="file-name"></span>--}}
{{--                <span class="size" dir="ltr"></span>--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--    </label>--}}

    <input  class="form-control" {{--class="level-card-preview-input"--}} type="{{ $inputObject['type'] }}" id="{{ $inputObject['id'] }}"
           name="{{ $inputObject['name'] }}"
           accept="{{ $inputObject['accept'] }}"
           onchange="previewData(event)">


    <script type="text/javascript">

        function previewData(event) {
            $('#after_selection').children('.file-name')[0].innerHTML = event.target.files[0].name;
            $('#after_selection').children('.size')[0].innerHTML = event.target.files[0].size / 1000 +' KB';
            console.log(event.target.files[0]);
        }
    </script>

@endisset


