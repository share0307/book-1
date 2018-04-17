#### 消息组成
```
Start line
Headers
Body
```

#### 请求消息格式
```
<method> <request-URL> <version>
<hearders>
<entity-body>
```

#### 响应消息格式
```
<version> <status> <response-phrase>
<headers>
<entity-body>
```

#### 请求方法
- GET: 获取
- HEAD：仅仅获取响应头：Headers
- POST：
- PUT：
- TRACE：检查代理
- OPTIONS：检查服务端接受的请求方式
- DELETE：删除

分组：
- HEAD,TRACE,OPTIONS
- GET, PUT, DELETE
- POST

扩展方法 WebDAV HTTP
- LOCK
- MKCOL
- COPY
- MOVE


#### 状态码
```
100-199  100-101   Informational
200-299  200-206   Successful
300-399  300-305   Redirection
400-499  400-415   Client error
500-599  500-505   Server error
```

#### Headers
- General headers
- Request headers
- Response headers
- Entity headers
- Extension headers

#### 通用头

#### 请求头

#### 响应头

#### 示例
```
- General
Request URL:https://www.zhihu.com/api/v4/questions/48482736/similar-questions?include=data%5B*%5D.answer_count%2Cauthor%2Cfollower_count&limit=5
Request Method:GET
Status Code:200 OK
Remote Address:47.95.51.100:443
Referrer Policy:no-referrer-when-downgrade

- Response headers
Cache-Control:private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0
Connection:keep-alive
Content-Encoding:br
Content-Type:application/json
Date:Fri, 26 Jan 2018 03:58:35 GMT
Etag:W/"c226eb083ef3fd130ef8d617036d7f00339f0344"
Expires:Fri, 02 Jan 2000 00:00:00 GMT
Pragma:no-cache
Server:ZWS
Transfer-Encoding:chunked
Vary:Accept-Encoding
X-Backend-Server:question-and-answer.qaweb.21c5f56a---10.3.9.68:31006[10.3.9.68:31006]
X-Req-ID:125109715A6AA76B
X-Req-SSL:proto=TLSv1.2,sni=,cipher=ECDHE-RSA-AES256-GCM-SHA384
X-Za-Response-Id:9e1382d205c73eb55e01fd1d675343c9

- Request headers
accept:application/json, text/plain, */*
Accept-Encoding:gzip, deflate, br
Accept-Language:zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7,ja;q=0.6
authorization:Bearer 2|1:0|10:1515290472|4:z_c0|92:Mi4xUW5IZ0F3QUFBQUFBY01MQnZaWHBDeVlBQUFCZ0FsVk5hTTAtV3dCUktQX0RCLUJ6elhGZGlPOHhoY3RqVURIRWpn|fe3d376c5b6ec360fabd9ef00be0aee07ea81bdffca713c612a413b95afbb4a6
Cache-Control:no-cache
Connection:keep-alive
Cookie:d_c0="AHDCwb2V6QuPTugIkg4YHX8Snbkjx2LjFuU=|1497434180"; _zap=2395b8b9-dca0-4e31-8806-9c2ac2209cb7; q_c1=cb188410455a4f0c8e0ef4003db3f0b7|1508426417000|1497434178000; l_cap_id="NjA2NmVmYjM5NzM2NDRkNjg2YjY0NDBmYmMyNGI4OWQ=|1515290044|962c3df2ab445540323e45007a04165d7351a344"; r_cap_id="ZjJlMzVhN2Y4NDRlNDRlZjllZGNhNDg4NTk0OTgwZTE=|1515290044|d65e935dbe646b318d4218a9bb013619492432b1"; cap_id="NDgxNzUxNGU4NjM5NDc0Mjg1MDc2Njg0MzcyNTc0MDQ=|1515290044|4e36989506f58b1cb4d89c59cca5b5a107d4c5fc"; capsion_ticket="2|1:0|10:1515290445|14:capsion_ticket|44:YmQ2NWI5ZTEwNGZjNDIzNTgxOGRhMjE2ZGU0YTBlNTE=|04ef1180fd35fa037809ba1b29f4535e9b35678c4ddf0f6b72113fe90514744b"; z_c0="2|1:0|10:1515290472|4:z_c0|92:Mi4xUW5IZ0F3QUFBQUFBY01MQnZaWHBDeVlBQUFCZ0FsVk5hTTAtV3dCUktQX0RCLUJ6elhGZGlPOHhoY3RqVURIRWpn|fe3d376c5b6ec360fabd9ef00be0aee07ea81bdffca713c612a413b95afbb4a6"; __utmv=51854390.100--|2=registration_date=20161231=1^3=entry_date=20161231=1; _xsrf=554f098074eff35f59f1e8d0bce3da70; q_c1=cb188410455a4f0c8e0ef4003db3f0b7|1516586878000|1497434178000; __utma=51854390.1771954050.1510223448.1516327673.1516845824.10; __utmz=51854390.1516845824.10.10.utmcsr=zhihu.com|utmccn=(referral)|utmcmd=referral|utmcct=/; aliyungf_tc=AQAAAPWaQmxP/QYA4KXseKtVSBmn0801; _xsrf=554f098074eff35f59f1e8d0bce3da70
Host:www.zhihu.com
Pragma:no-cache
Referer:https://www.zhihu.com/question/48482736
User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36
X-UDID:AHDCwb2V6QuPTugIkg4YHX8Snbkjx2LjFuU=
```

