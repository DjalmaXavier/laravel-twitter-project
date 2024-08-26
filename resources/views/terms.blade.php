@extends('layouts.layout') {{-- Call the layout --}}

@section('title', 'Terms')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">
            {{-- Ensure this section is in the right position in layout --}}
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sodales efficitur tortor. Fusce molestie,
                erat vitae lobortis tempus, massa felis malesuada enim, sed tincidunt purus ipsum rhoncus tellus.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis posuere,
                dolor ac faucibus vulputate, risus magna dictum mauris, porta mollis diam urna et magna. Vivamus at blandit
                nunc. Nunc fermentum ornare nisi, sit amet pretium odio blandit et. Maecenas nec dolor hendrerit, rhoncus
                urna auctor, varius enim. Sed condimentum ante ac pharetra imperdiet. Integer risus lorem, interdum vel
                porta a, dignissim at dui. Duis gravida erat id quam luctus semper. Pellentesque ut facilisis ligula, ac
                efficitur ligula.

                Cras condimentum nibh eu venenatis rhoncus. Ut metus massa, faucibus at consequat non, ultricies nec eros.
                Phasellus elementum vehicula eleifend. Vivamus eget augue id lorem lobortis fringilla. Donec a tortor at sem
                mollis dapibus. Curabitur nibh nunc, vestibulum non faucibus sed, blandit in libero. Mauris eget urna est.
                Suspendisse urna augue, porta nec sem quis, commodo lobortis ex. Etiam facilisis laoreet urna vitae
                condimentum. Nullam commodo sodales feugiat. Nullam sodales nisi id lorem tempus, sed dictum augue pulvinar.

                Phasellus quis libero tristique dui iaculis lacinia. Curabitur nibh tellus, auctor id vestibulum vitae,
                egestas eget dui. Aenean odio purus, rutrum non ipsum vel, suscipit lobortis velit. Cras vitae tempus velit,
                ut tempus elit. Aenean tincidunt sollicitudin magna, sed luctus quam dignissim non. Mauris vel risus sit
                amet nibh commodo euismod. Ut a pellentesque nunc. Nulla facilisi. Nam odio mi, volutpat vitae vulputate
                vel, consequat id sapien. Nulla sit amet lorem id lacus ultricies finibus quis in turpis. Curabitur in urna
                eros.

                Mauris non gravida nulla, aliquet venenatis mi. Proin ut lorem molestie, imperdiet elit vitae, pulvinar
                tellus. Pellentesque lacinia consequat quam, sit amet sagittis arcu aliquam ac. Sed lobortis vestibulum
                commodo. Duis luctus purus vel odio cursus, at finibus enim vehicula. Proin leo mauris, sagittis venenatis
                venenatis sed, congue at mauris. Integer nulla purus, lobortis quis ultrices id, scelerisque ac ligula. Sed
                consectetur mollis neque, in elementum nulla ultrices nec. Donec ornare dolor in maximus tincidunt. In
                vulputate enim eros, dignissim luctus augue lacinia sed. Nam sodales, diam quis viverra pellentesque, arcu
                dolor facilisis mauris, non porttitor ipsum dui vel ante. Morbi posuere sit amet dolor quis lacinia. Proin
                scelerisque neque sem, quis fermentum nisi venenatis ornare. Etiam quis vehicula risus, id auctor risus.

                Duis metus justo, convallis eget porta quis, porta id leo. Orci varius natoque penatibus et magnis dis
                parturient montes, nascetur ridiculus mus. Donec in massa id tortor iaculis eleifend et sit amet erat. Orci
                varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam dictum cursus
                tincidunt. Proin turpis lorem, tincidunt a viverra non, dictum non justo. Aliquam quis dui nisi. Vivamus
                dignissim congue blandit. Integer faucibus erat eu quam lobortis auctor.

                In ultricies, urna id faucibus dictum, massa massa vulputate velit, et condimentum ante ex ut eros. Nullam
                arcu leo, ornare ut eros in, volutpat vulputate metus. Donec ante ipsum, condimentum et condimentum non,
                convallis quis turpis. Donec in justo tortor. Nam pretium enim at maximus faucibus. Donec vel dui id odio
                eleifend dignissim. Sed dictum urna id tellus mollis, sit amet tempor neque tempor. Morbi eget dolor
                tristique, semper orci in, feugiat augue. Morbi consectetur imperdiet leo, venenatis vulputate lectus
                rhoncus maximus. Morbi id arcu suscipit, vulputate lacus eu, sodales arcu. Cras ultricies diam sed
                sollicitudin viverra. In eget convallis est. Morbi velit lectus, vulputate sit amet laoreet vitae, elementum
                ac turpis. Suspendisse id accumsan elit, molestie rhoncus velit.
            </div>
        </div>
        <div class="col-3">
            @include('shared.follow-box')
        </div>
    </div>
@endsection
