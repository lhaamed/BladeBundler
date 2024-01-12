@isset($inputObject)

    <label for="{{ $inputObject['id'] }}" class="level-card-preview">
        <img src="{{ $inputObject['default_preview'] }}" alt="" id="{{ $inputObject['preview_id'] }}">
    </label>

    <input class="level-card-preview-input" type="file" id="{{ $inputObject['id'] }}"
           name="{{ $inputObject['name'] }}"
           accept="{{ $inputObject['accept'] }}"
           @isset($inputObject['default_preview'])onchange="previewImage(event,'{{ $inputObject['preview_id'] }}')"@endisset>


    <script>
        function previewImage(event, target_id) {
            if (event.target.files.length > 0) document.querySelector("img#" + target_id).src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endisset


