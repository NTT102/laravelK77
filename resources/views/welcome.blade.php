<?php
    $weather = "nang";
    $data = [
        [
            'name' => "tùng",
            'job' => "dev"
        ],
        [
            'name' => "Hoàng lồn",
            'job' => "quét rác"
        ]
    ];
?>


@foreach ($data as $item)
    <h1>Tên : {{ $item['name'] }}</h1>
    <h2>Công việc: {{ $item['job'] }}</h2>
    <br>
@endforeach