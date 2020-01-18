$client = ClientBuilder::create()->build();
        for ($i=0; $i < 10; $i++) { 
            $params = [
                'index' => 'my_index',
                'type' => 'my_type',
                'id' => 'my_id'.$i,
                'body' => [
                'testField' => 'Quick brown fox'. $i,
                'size'=> $i==9 ? "fox9" : "abc"
                ] // 此条数据的内容，数组可以任意定义。
            ];
            $response = $client->index($params);
        }
            
        $params = [
                'index' => 'my_index',
                'type' => 'my_type',
                // 'id' => 'my_id11',
                'body' => [
                'testField' => 'Quick brown fox abc',
                'size'=>  "aaa"
                ] // 此条数据的内容，数组可以任意定义。
            ];
            $response = $client->index($params);
        
        // print_r($response);

        // $params = [
        //     'index' => 'my_index',
        //     'type' => 'my_type',
        //     'id' => 'my_id'
        // ];

        // $response = $client->get($params);
        $params = [
        'index' => 'my_index',
        'type' => 'my_type',
        'body' => [
            'query' => [
                'match' => [
                    'testField' => 'fox9'
                ]
            ]
        ]
    ];

    $params = [
        'index' => 'my_index',
        'type' => 'my_type',
        'body' => [
            'query' => [
                'multi_match' => [
                    'query' => 'abc',//查询内容
                    "fields"=>["size","testField"]//查询字段
                ]
            ],
            
            "from"=>1,
            "size"=>1
            
        ]
    ];

    $response = $client->search($params);
        print_r($response);
        
        
     $response = $client->indices()->delete(['index' => 'my_index']);//删除索引    
