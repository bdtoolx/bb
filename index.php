<?php

                            $url = "https://everify.bdris.gov.bd/";
                            
                            $headers = [
                                "Host: everify.bdris.gov.bd",
                                "Cache-Control: max-age=0",
                                "Sec-Ch-Ua: \"Not A(Brand\";v=\"8\", \"Chromium\";v=\"132\"",
                                "Sec-Ch-Ua-Mobile: ?0",
                                "Sec-Ch-Ua-Platform: \"Windows\"",
                                "Accept-Language: en-GB,en;q=0.9",
                                "Upgrade-Insecure-Requests: 1",
                                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36",
                                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
                                "Sec-Fetch-Site: none",
                                "Sec-Fetch-Mode: navigate",
                                "Sec-Fetch-User: ?1",
                                "Sec-Fetch-Dest: document",
                                "Accept-Encoding: gzip, deflate, br",
                                "Priority: u=0, i"
                            ];
                            
                            // Define cookies
                            $cookies = [
                                "ASP.NET_SessionId" => "mgeap4zv5clmuf2t4sfd02fc",
                                "__RequestVerificationToken" => "IKS-eI61D2NQR65IWGhijUSTSAmlQI61L4JlPxQZyNiW2SzM4aCz2AXk655k5JiZQPn-Usk1QG_4HEYcCXvZt6VuA9kPr0lp7dVcPdfI9jI1",
                                "TSPD_101" => "08f04b28f2ab2800e4fae52196cbae0c5c715c8b7a3295d7badb0b87404ee3d96b78c065f0ad614169d3614cc35ff628086071b40c0518000df673eb1045ee932d5ecaa26c0b13e02ce2a7ec5f0a4868",
                                "TS018a6c6e" => "01ab52a7c0d07f5f406784644cc66ba4cae966503d67af7d6413e62f5125cbe94fc4e1e4a73a2a886535ca2f9e23471f3827d39d70273e1db4170c239a9f661f666d7c357d9011c21348f44fec3b591456e95c57bd6a6a3f2b83f5a9d5ef5518bd4a77b164",
                                "TS04c851fb029" => "08f04b28f2ab2800053e360fa516934c26ed76db9e020043fd8388b65f93c64ef52c9435b6a2d45ea4a9378866b75844",
                                "TS04c851fb077" => "08f04b28f2ab2800f3eda404b81e31b5b85c56d5bd3b765e5d9852ed65ad9e4fe4ae4191b2afdec81939ee77d14c05c108399279e41720005c695bc11b93dd3b43757b5c96f607e3d7ea2091737a8495041ef4127c5194c3",
                                "TSbf8f33ea027" => "08f04b28f2ab2000bdfa8fcceeab2db90735db48d6180f5cb8f9ee542ec04f48d4d8130f5ee0e03808d0d724651130004b196aab82f3e04a297fc0384ac7431ff19b8a8597400b13448dbabd36d14e1b0a4ae81044e1555fd1a2f3e08d634dd9"
                            ];
                            
                            // Initialize cURL session
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_COOKIE, http_build_query($cookies, '', '; '));
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            
                            // Execute the cURL session and get the response
                            $response = curl_exec($ch);
                            
                            // Check if the request was successful
                            if ($response !== false) {
                                // Use regex to find the t parameter
                                preg_match('/t=([a-f0-9]{32})/', $response, $matches);
                            
                                if (!empty($matches[1])) {
                                    $result = $matches[1];
                                     "Found token: " . $result . "\n";
                                } else {
                                    echo "No match found.\n";
                                }
                            } else {
                                echo "Request failed with cURL error: " . curl_error($ch) . "\n";
                            }
                            
                            // ===============================================
                            if ($response === false) {
                            header("Location: birthab.php");
                            exit(); // স্ক্রিপ্ট বন্ধ করার জন্য
                            } else {
                             json_encode(["success" => true, "message" => "E-Verify server is running!"]);
                            }
                            // ===============================================
                            
                            $captcha_url = "https://everify.bdris.gov.bd/DefaultCaptcha/Generate?t=" . $result;
                            
                            $headers = [
                                "Host: everify.bdris.gov.bd",
                                "Sec-Ch-Ua-Platform: \"Windows\"",
                                "Accept-Language: en-GB,en;q=0.9",
                                "Sec-Ch-Ua: \"Not A(Brand\";v=\"8\", \"Chromium\";v=\"132\"",
                                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36",
                                "Sec-Ch-Ua-Mobile: ?0",
                                "Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8",
                                "Sec-Fetch-Site: same-origin",
                                "Sec-Fetch-Mode: no-cors",
                                "Sec-Fetch-Dest: image",
                                "Referer: https://everify.bdris.gov.bd/",
                                "Accept-Encoding: gzip, deflate, br",
                                "Priority: u=2, i"
                            ];
                            
                            $cookies = [
                                "ASP.NET_SessionId" => "mgeap4zv5clmuf2t4sfd02fc",
                                "__RequestVerificationToken" => "IKS-eI61D2NQR65IWGhijUSTSAmlQI61L4JlPxQZyNiW2SzM4aCz2AXk655k5JiZQPn-Usk1QG_4HEYcCXvZt6VuA9kPr0lp7dVcPdfI9jI1",
                                "TS018a6c6e" => "01ab52a7c0470ee1ab79ed283451c808d32b404c3125e01e6f4fa95338829ef6dafd83d5d72b31f2965cb64dc43960a92e3c3cd89c90c03f7ed50906f4d3f1c42a97df9affe97d9491bfb6c283608fb09a6260c5ac945a7ee6fd2ab5671d15c288bac84a6a",
                                "TSPD_101" => "08f04b28f2ab280067bb56fc2dd33314620beb8ba84364bdf57c3934585450f835e82ea4c01421b4d22d25c0ad6ac4dd0851790da405180057d80bf16b4c18dc2d5ecaa26c0b13e02ce2a7ec5f0a4868",
                                "TSbf8f33ea027" => "08f04b28f2ab2000b382a8103450f170549b21c33e3b14d8264040362551dfe32eaca87280e928a308c08ce78a1130005b036ae6e8dc16852392c3f17160d5daec7a123f02658ad41839faff5d9a75ed3d4aa3407213cf56976e4b8e4b19a021"
                            ];
                            
                            
                            $ch = curl_init($captcha_url);
                            
                            // Set cURL options for captcha request
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_COOKIE, http_build_query($cookies, '', '; '));  // Use correct cookies format
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            
                            $captcha_response = curl_exec($ch);
                            
                            if ($captcha_response !== false) {
                                file_put_contents("captcha.png", $captcha_response);
   
                                 "Captcha image saved successfully.\n";
                            } else {
                                echo "Captcha request failed with cURL error: " . curl_error($ch) . "\n";
                            }
                            curl_close($ch);
                            ?>
