<?php

// that part is what i use in core file for deviceActivation
define ( 'APPLE_ALBERT_ACTIVATION', 'https://17.171.27.65/deviceservices/deviceActivation' );
define ( 'USER_AGENT_ACTIVATION', 'iTunes/11.1 (Macintosh; U; Intel Mac OS X 10.5.6)' );

// headers part for his one
define ( 'CONTENT_MULTIPART', 'Content-type: multipart/form-data; charset="UTF-8"' );
define ( 'CONTENT_MULTIPART_B', 'Content-type: multipart/form-data; boundary=9F0DD69A-672E-4E38-81AB-B71D7F94F8AD' );
define ( 'CHACHE_CONTROL', 'Cache-Control: private, no-cache, no-store, must-revalidate, max-age=0' );
define ( 'ACCEPT_LANGUAGE', 'Accept-Language: en-us' );
define ( 'CONTENT_TEXT', 'Content-type: text/plain' );
define ( 'CONTENT_HTML', 'Content-type: text/html; charset="UTF-8"' );

$login                  = "z0r.days@gmail.com";
$password               = "s78963210S";
$isAuthRequired         = "true";
$activation_info_base64 = "PGRpY3Q+Cgk8a2V5PkFjdGl2YXRpb25JbmZvQ29tcGxldGU8L2tleT4KCTx0cnVlLz4KCTxrZXk+
QWN0aXZhdGlvbkluZm9YTUw8L2tleT4KCTxkYXRhPgoJUEQ5NGJXd2dkbVZ5YzJsdmJqMGlNUzR3
SWlCbGJtTnZaR2x1WnowaVZWUkdMVGdpUHo0S1BDRkVUME5VV1ZCRklIQnMKCWFYTjBJRkJWUWt4
SlF5QWlMUzh2UVhCd2JHVXZMMFJVUkNCUVRFbFRWQ0F4TGpBdkwwVk9JaUFpYUhSMGNEb3ZMM2Qz
CglkeTVoY0hCc1pTNWpiMjB2UkZSRWN5OVFjbTl3WlhKMGVVeHBjM1F0TVM0d0xtUjBaQ0krQ2p4
d2JHbHpkQ0IyWlhKegoJYVc5dVBTSXhMakFpUGdvOFpHbGpkRDRLQ1R4clpYaytRV04wYVhaaGRH
bHZibEpoYm1SdmJXNWxjM004TDJ0bGVUNEsKCUNUeHpkSEpwYm1jK01VSkdOVGxEUkRndFJFSTBS
aTAwTmpaQkxVRkdOVFl0UlRJNU4wSkNOak0xTmprd1BDOXpkSEpwCglibWMrQ2drOGEyVjVQa0Zq
ZEdsMllYUnBiMjVTWlhGMWFYSmxjMEZqZEdsMllYUnBiMjVVYVdOclpYUThMMnRsZVQ0SwoJQ1R4
MGNuVmxMejRLQ1R4clpYaytRV04wYVhaaGRHbHZibE4wWVhSbFBDOXJaWGsrQ2drOGMzUnlhVzVu
UGxWdVlXTjAKCWFYWmhkR1ZrUEM5emRISnBibWMrQ2drOGEyVjVQa0poYzJWaVlXNWtRV04wYVha
aGRHbHZibFJwWTJ0bGRGWmxjbk5wCgliMjQ4TDJ0bGVUNEtDVHh6ZEhKcGJtYytWakk4TDNOMGNt
bHVaejRLQ1R4clpYaytRbUZ6WldKaGJtUkRhR2x3U1VROAoJTDJ0bGVUNEtDVHhwYm5SbFoyVnlQ
amN5T0RJNU1UTThMMmx1ZEdWblpYSStDZ2s4YTJWNVBrSmhjMlZpWVc1a1RXRnoKCWRHVnlTMlY1
U0dGemFEd3ZhMlY1UGdvSlBITjBjbWx1Wno1QlJVRTFRME5GTVRRek5qWTRSREJGUmtJMFEwVXhS
akpECglPVFJET1RZMlFUWTBPVFpETmtGQlBDOXpkSEpwYm1jK0NnazhhMlY1UGtKaGMyVmlZVzVr
VTJWeWFXRnNUblZ0WW1WeQoJUEM5clpYaytDZ2s4WkdGMFlUNEtDVXRJWjJWUWR6MDlDZ2s4TDJS
aGRHRStDZ2s4YTJWNVBrSjFhV3hrVm1WeWMybHYKCWJqd3ZhMlY1UGdvSlBITjBjbWx1Wno0eE1V
UXhOamM4TDNOMGNtbHVaejRLQ1R4clpYaytSR1YyYVdObFEyVnlkRkpsCgljWFZsYzNROEwydGxl
VDRLQ1R4a1lYUmhQZ29KVEZNd2RFeFRNVU5TVldSS1ZHbENSRkpXU2xWVFZWcEtVVEJHVlZKVAoJ
UWxOU1ZrWldVbFpPVlV4VE1IUk1VekJMVkZWc1NsRnVhRVZSTUU1Q1ZYcENSRkZXUmtJS0NXUXla
RnBVV0doTlZrVkcKCWVWRnRaRTlXYTBwQ1ZGWlNTMUpWYkROVmExSlNaVVV4UldGNlRrMVdSWEJI
VkZkMFZtUkZOVVpYYTFaUFVYcEdSRlZ0CgljRTVsWjNCTkNnbFdSMk41VlZod1FrMUZNVFpYYTJS
T1VrVkZlRlJ1Y0VaVVJURkNZVEJrUWsxV1ZrWlJiV2hPVVRGYQoJVjFSWWFFUmxhMFpMVVcxa1Qx
WnJTa0phTVZKQ1lUQTFRd29KVkZaS1NtUXdWa0pYVlZKWFZWWkdTVU5yVmpOaVJWSnIKCVYwVktj
MWt5TlZOalIwcDBUMGhvUm1WclJsTlJiV1JQVm10S1FtSXhVa1JoTUZveldUQmtOR0pGYkVZS0NX
SklWbHBsCglWRkkwVWtod1FsUnJTbTVVYkZwRFVWaE9WVkZ0TVhOVlYwWklUMWhWUzFkc1VrUlJi
VFUyVVZVMVExb3lkSGhoUjNSdwoJVW5wc00wMUZTa0pWVlZaSENnbFJWVVpRVVcxd1VsRllaRzVY
VjNSRVdqRnNSbEZZUW5KVlZXeEpUbXMxYUZaNU9XRmoKCVYzUlJWMnBGZGxwclpIZGpSa3BzVW1k
d00ySXdSazlUTWtaSFkwZGFUQW9KVlZoQ05WTnBjelZUTTFKT1RVaENSVlI2CglTWGxVUkdSTlRE
SnNlbFpWVVhwUFNFRXlUbXRXUlZWdFVuWk9iR1F4VXpBNE5VMTZTakZqYkd4SFVWZGFRazVZWkVj
SwoJQ1ZwVmFERkRiRTUwV1ZOMGMxVXlWa0pUVkd4S1ZHeGFiMU5yZEhKVlZ6bFFZMWRhZWxKWVFr
bGthbEl5V2taSk5HRlYKCVZqRldWVlpRV21wb1dFMHdTa2RpTVd4MUNnbFpha1o1UzNwT1NHUlZk
R2xWTUd4dllqQTVNVmxYV1V0YWJYaEVUMFprCglNRkV5VGpCVGVrcFhUbFphVTFOc2FIVlNWVTVD
WkRCV1FsRlhSa0pSVlRGQ1RVVmtSQW9KVlROR1NGVXdiR2xOTUZKUwoJVWxWS1ExVldWa0pSVkZK
SVVXdEdSR0pYYkRGalJHUmFZVVpHYVZaM2NHcGhhM0EyWTFaS2NWTXdkM3BXVlhCNFUwUm8KCVRs
RXlUbGdLQ1ZaSFVuTlBSazVXVkRKMGRHVklTbWhrYTJoTVRtczFWRkpyWnpOWFZUVlBVVmhvTVZw
WVpIaFRSMnhICglVMGhDYkU5WGFERlVlbWcyWWxjd2RrTnFaekZOV0djd0NnbGhiV013VGpCc01X
RnRTa0prTUZaeVV6RmtXVmxyUm5aWAoJUjBaWlZsaE9TbUl3YUVSWmJteDBaV3M0TUZaV2NFdGhW
MUV4VVRKd2JrNXFiRVZrTVd4MFlWZDRjd29KVWtWV1RsUXcKCVZuUmhSVTFMWVd0dk0yVlVXbTVT
VmtGeVVucG9kRkV5Ykc1aFYxcDZUMVZHTWxWdFpIcGlWMUpwVTFWYVZVNVhWVXRNCglVekIwVEZN
eFJsUnJVV2NLQ1ZFd1ZsTldSV3hIVTFWT1FsWkZWV2RWYTFaU1ZsVldWRlpETUhSTVV6QjBRMmM5
UFFvSgoJUEM5a1lYUmhQZ29KUEd0bGVUNUVaWFpwWTJWRGJHRnpjend2YTJWNVBnb0pQSE4wY21s
dVp6NXBVR2h2Ym1VOEwzTjAKCWNtbHVaejRLQ1R4clpYaytSR1YyYVdObFZtRnlhV0Z1ZER3dmEy
VjVQZ29KUEhOMGNtbHVaejVDUEM5emRISnBibWMrCglDZ2s4YTJWNVBrWk5hVkJCWTJOdmRXNTBS
WGhwYzNSelBDOXJaWGsrQ2drOFptRnNjMlV2UGdvSlBHdGxlVDVKYm5SbAoJWjNKaGRHVmtRMmx5
WTNWcGRFTmhjbVJKWkdWdWRHbDBlVHd2YTJWNVBnb0pQSE4wY21sdVp6NDRPVEF4TVRJd01UQXcK
CU1EQXpNVE01TVRJNU16d3ZjM1J5YVc1blBnb0pQR3RsZVQ1SmJuUmxjbTVoZEdsdmJtRnNUVzlp
YVd4bFJYRjFhWEJ0CglaVzUwU1dSbGJuUnBkSGs4TDJ0bGVUNEtDVHh6ZEhKcGJtYytNelU0TnpV
Mk1EVTJOVGs0TURNMVBDOXpkSEpwYm1jKwoJQ2drOGEyVjVQa2x1ZEdWeWJtRjBhVzl1WVd4TmIy
SnBiR1ZUZFdKelkzSnBZbVZ5U1dSbGJuUnBkSGs4TDJ0bGVUNEsKCUNUeHpkSEpwYm1jK016RXdN
VEl3TVRBek1UTTVNVEk1UEM5emRISnBibWMrQ2drOGEyVjVQazF2WW1sc1pVVnhkV2x3CgliV1Z1
ZEVsa1pXNTBhV1pwWlhJOEwydGxlVDRLQ1R4emRISnBibWMrTXpVNE56VTJNRFUyTlRrNE1ETThM
M04wY21sdQoJWno0S0NUeHJaWGsrVFc5a1pXeE9kVzFpWlhJOEwydGxlVDRLQ1R4emRISnBibWMr
VFVVek5USThMM04wY21sdVp6NEsKCUNUeHJaWGsrVUhKdlpIVmpkRlI1Y0dVOEwydGxlVDRLQ1R4
emRISnBibWMrYVZCb2IyNWxOaXd4UEM5emRISnBibWMrCglDZ2s4YTJWNVBsQnliMlIxWTNSV1pY
SnphVzl1UEM5clpYaytDZ2s4YzNSeWFXNW5QamN1TVR3dmMzUnlhVzVuUGdvSgoJUEd0bGVUNVNa
V2RwYjI1RGIyUmxQQzlyWlhrK0NnazhjM1J5YVc1blBreE1QQzl6ZEhKcGJtYytDZ2s4YTJWNVBs
SmwKCVoybHZia2x1Wm04OEwydGxlVDRLQ1R4emRISnBibWMrVEV3dlFUd3ZjM1J5YVc1blBnb0pQ
R3RsZVQ1U1pXZDFiR0YwCgliM0o1VFc5a1pXeE9kVzFpWlhJOEwydGxlVDRLQ1R4emRISnBibWMr
UVRFME5UTThMM04wY21sdVp6NEtDVHhyWlhrKwoJVTBsTlIwbEVNVHd2YTJWNVBnb0pQR1JoZEdF
K0Nna3ZkejA5Q2drOEwyUmhkR0UrQ2drOGEyVjVQbE5KVFVkSlJESTgKCUwydGxlVDRLQ1R4a1lY
UmhQZ29KUVZFOVBRb0pQQzlrWVhSaFBnb0pQR3RsZVQ1VFNVMVRkR0YwZFhNOEwydGxlVDRLCglD
VHh6ZEhKcGJtYythME5VVTBsTlUzVndjRzl5ZEZOSlRWTjBZWFIxYzFKbFlXUjVQQzl6ZEhKcGJt
YytDZ2s4YTJWNQoJUGxObGNtbGhiRTUxYldKbGNqd3ZhMlY1UGdvSlBITjBjbWx1Wno1R01UZE1V
RUpUV1VaR1JGSThMM04wY21sdVp6NEsKCUNUeHJaWGsrVTNWd2NHOXlkSE5RYjNOMGNHOXVaVzFs
Ym5ROEwydGxlVDRLQ1R4MGNuVmxMejRLQ1R4clpYaytWVzVwCgljWFZsUTJocGNFbEVQQzlyWlhr
K0NnazhhVzUwWldkbGNqNDJNVEF3TURnME5UTTVOVE0yUEM5cGJuUmxaMlZ5UGdvSgoJUEd0bGVU
NVZibWx4ZFdWRVpYWnBZMlZKUkR3dmEyVjVQZ29KUEhOMGNtbHVaejQyWmpFeU1HTXdaRFExTURG
aE9XRm0KCU5Ea3dPR05oWkRFeE1URXhZalpoTVRZek56WXlOVGsxUEM5emRISnBibWMrQ2drOGEy
VjVQbXREVkZCdmMzUndiMjVsCgliV1Z1ZEVsdVptOVFVa2xXWlhKemFXOXVQQzlyWlhrK0Nnazhj
M1J5YVc1blBqQXVNUzQ1TlR3dmMzUnlhVzVuUGdvSgoJUEd0bGVUNXJRMVJRYjNOMGNHOXVaVzFs
Ym5SSmJtWnZVRkpNVG1GdFpUd3ZhMlY1UGdvSlBHbHVkR1ZuWlhJK01Ed3YKCWFXNTBaV2RsY2o0
S1BDOWthV04wUGdvOEwzQnNhWE4wUGdvPQoJPC9kYXRhPgoJPGtleT5GYWlyUGxheUNlcnRDaGFp
bjwva2V5PgoJPGRhdGE+CglNSUlDeERDQ0FpMmdBd0lCQWdJTk16T3ZCd1FDcndBQ3J3QUFCREFO
QmdrcWhraUc5dzBCQVFVRkFEQjdNUXN3Q1FZRAoJVlFRR0V3SlZVekVUTUJFR0ExVUVDaE1LUVhC
d2JHVWdTVzVqTGpFbU1DUUdBMVVFQ3hNZFFYQndiR1VnUTJWeWRHbG0KCWFXTmhkR2x2YmlCQmRY
Um9iM0pwZEhreEx6QXRCZ05WQkFNVEprRndjR3hsSUVaaGFYSlFiR0Y1SUVObGNuUnBabWxqCglZ
WFJwYjI0Z1FYVjBhRzl5YVhSNU1CNFhEVEEzTURRd01qRTFNVGN5T0ZvWERURXlNRE16TVRFMU1U
Y3lPRm93WnpFTAoJTUFrR0ExVUVCaE1DVlZNeEV6QVJCZ05WQkFvVENrRndjR3hsSUVsdVl5NHhG
ekFWQmdOVkJBc1REa0Z3Y0d4bElFWmgKCWFYSlFiR0Y1TVNvd0tBWURWUVFERXlGcFVHaHZibVV1
TXpNek0wRkdNRGN3TkRBeVFVWXdNREF5UVVZd01EQXdNRFF3CglnWjh3RFFZSktvWklodmNOQVFF
QkJRQURnWTBBTUlHSkFvR0JBT3JFK1o2V2xIVmFLTE1LZ3FwZlhTWDd3UjA0Qy9VcAoJN21QdWh3
STlsZG51NlpmQUdLYURaeGFOUjAzMGY1US9GNHkxbWYwVkFwK0w0elZtRTZFbTYxVG5NRENjL3lW
KzhzWUcKCUR4THprWU9hVHlDaXNMV3VLS2t6Y2ptK01aampVMXJ6cWpoRlZSbTBBMFRVVXRJdXJT
bHp0SGpkVEtpTGlPdk1aRGtpCgkxenU1QWdNQkFBR2pZREJlTUE0R0ExVWREd0VCL3dRRUF3SUR1
REFNQmdOVkhSTUJBZjhFQWpBQU1CMEdBMVVkRGdRVwoJQkJTWlAzR21aQzJ5UjFNNThGbTFXZy9o
dEVnTzZEQWZCZ05WSFNNRUdEQVdnQlQ2RGRRUmtSdm1zazRlQmttVUVkMWoKCVlnZFpaREFOQmdr
cWhraUc5dzBCQVFVRkFBT0JnUUFsUURGUzFBRGhPR2t5M09ZWHFITFUvMmJKVFBCamxzWkhBQURI
CglRMk1zbTJZT0s4SHZ4NlNPKytkU2c3bE02RTAvUEk5MVdnY3JZR3NLUXl6OXhheGtEczkrMUpp
ZkIybXNHYmd1N1IvcgoJeDFmV0ZmK3M1ZXF5MTlhZWZYUzhtTHJ4aVBhZU5yeTNwVkxMdTdhWDdJ
b2tOQlU4aVd5Nkg1STR2VFJodTMyUXh6Q0MKCUEzRXdnZ0pab0FNQ0FRSUNBUkV3RFFZSktvWklo
dmNOQVFFRkJRQXdZakVMTUFrR0ExVUVCaE1DVlZNeEV6QVJCZ05WCglCQW9UQ2tGd2NHeGxJRWx1
WXk0eEpqQWtCZ05WQkFzVEhVRndjR3hsSUVObGNuUnBabWxqWVhScGIyNGdRWFYwYUc5eQoJYVhS
NU1SWXdGQVlEVlFRREV3MUJjSEJzWlNCU2IyOTBJRU5CTUI0WERUQTNNREl4TkRFNU1qQTBNVm9Y
RFRFeU1ESXgKCU5ERTVNakEwTVZvd2V6RUxNQWtHQTFVRUJoTUNWVk14RXpBUkJnTlZCQW9UQ2tG
d2NHeGxJRWx1WXk0eEpqQWtCZ05WCglCQXNUSFVGd2NHeGxJRU5sY25ScFptbGpZWFJwYjI0Z1FY
VjBhRzl5YVhSNU1TOHdMUVlEVlFRREV5WkJjSEJzWlNCRwoJWVdseVVHeGhlU0JEWlhKMGFXWnBZ
MkYwYVc5dUlFRjFkR2h2Y21sMGVUQ0JuekFOQmdrcWhraUc5dzBCQVFFRkFBT0IKCWpRQXdnWWtD
Z1lFQXNtYzhYU3Juai9KM3orOHh2TkVFL2VxZjBJWXBrQXFqLzJSSzcybjBDcm52eE1Sanlqb3RJ
VDFTCglqQ09KS2FyYkY5ekxLTVJwelhJa3doREI5SGdkTVJiRjV1b1pIU296dm9DcjNCRklCaW9m
RG1HQnpYbWFYUkwwaEpESQoJZlBaNG0xTDQrdkdJYmhCeStGM0xpT3kyVlJTWHBFMEx3VThuWjVt
bXBMUFgycTBDQXdFQUFhT0JuRENCbVRBT0JnTlYKCUhROEJBZjhFQkFNQ0FZWXdEd1lEVlIwVEFR
SC9CQVV3QXdFQi96QWRCZ05WSFE0RUZnUVUrZzNVRVpFYjVySk9IZ1pKCglsQkhkWTJJSFdXUXdI
d1lEVlIwakJCZ3dGb0FVSzlCcFI1UjJDZjcwYTQwdVFLYjNSMDEvQ0Y0d05nWURWUjBmQkM4dwoJ
TFRBcm9DbWdKNFlsYUhSMGNEb3ZMM2QzZHk1aGNIQnNaUzVqYjIwdllYQndiR1ZqWVM5eWIyOTBM
bU55YkRBTkJna3EKCWhraUc5dzBCQVFVRkFBT0NBUUVBd0tCeitCM3FITkhOeFlaMXBMdnJRTVZx
TFF6K1cveHV3VnZYU0gxQXFXRXRTemR3CglPTzhHa1V1dkVjSWZsZTZJTTI5ZmN1cjIxWGExVjFo
eDhENFF3OVV1dXkrbU9uUENNbVVLVmdRV0daaE5DM2h0MEtOMAoJWkpoVTlLZlhIYUwvS3NONUFM
S1o1K2U3MVFhaTYwa3phV2RCQVptdGFMRFRldlNWNFAwa2lDb1E1Nk5vLzYxNyt0bTYKCThhVi95
cE9pemdNM0EyYUZrd1ViTWZaMWdwTXYwL0RhT1RjOVgvNjZ6WnB3d0FhTEl1NnB6Z1J1SkdrN0Zs
S2x3UExBCglya053aExzaGtVUEx1N2ZxVzdxVDRMZDNpZTlOVmdRelhjNWNXVEduMXp0RlZoSE5y
c3ViRHFEUDNKT295c1ZZZUFBRgoJMlptcjFsNkg2cEp6TkZTamt4aWtnekNDQkxzd2dnT2pvQU1D
QVFJQ0FRSXdEUVlKS29aSWh2Y05BUUVGQlFBd1lqRUwKCU1Ba0dBMVVFQmhNQ1ZWTXhFekFSQmdO
VkJBb1RDa0Z3Y0d4bElFbHVZeTR4SmpBa0JnTlZCQXNUSFVGd2NHeGxJRU5sCgljblJwWm1sallY
UnBiMjRnUVhWMGFHOXlhWFI1TVJZd0ZBWURWUVFERXcxQmNIQnNaU0JTYjI5MElFTkJNQjRYRFRB
MgoJTURReU5USXhOREF6TmxvWERUTTFNREl3T1RJeE5EQXpObG93WWpFTE1Ba0dBMVVFQmhNQ1ZW
TXhFekFSQmdOVkJBb1QKCUNrRndjR3hsSUVsdVl5NHhKakFrQmdOVkJBc1RIVUZ3Y0d4bElFTmxj
blJwWm1sallYUnBiMjRnUVhWMGFHOXlhWFI1CglNUll3RkFZRFZRUURFdzFCY0hCc1pTQlNiMjkw
SUVOQk1JSUJJakFOQmdrcWhraUc5dzBCQVFFRkFBT0NBUThBTUlJQgoJQ2dLQ0FRRUE1SkdwQ1Ir
UjJ4NUhVT3NGN1Y1NWhDM3JOcUpYVEZYc2l4bUozdmxMYlBVSHF5SXdBdWdZUHZoUUNkTi8KCVFh
aVkrZEhLWnB3a2F4SFFvN3ZrR3lyREg1V2VlZ3lrUjR0YjFCWTNNOHZFRDAzT0ZHblJ5Umx5OVYw
TzFYOWZtL0lsCglBN3BWajAxZERmRmtOU01WU3hWWkhiT1U5L2FjbnM5UXVzRllVR2VQQ0xRZzk4
dXNMQ0J2Y0xZL0FUQ010MFBQRDUwOQoJOHl0SktCckkvczYxdVE3Wlhoeld5ejIxT3EzMER3NEFr
Z3V4SVJZdWROVThEZHRpRnF1amNaSkhVMVhCcnk5QnMvajcKCTQzRE41cU5NUlg0ZlRHdFFsa0dK
eEhSaUN4Q0RRWWN6aW9HeE1GanNXZ1F5akdpemp4M2VaWFAvWjE1bHZFbllkcDh6CglGR1doZDVU
SkxRSURBUUFCbzRJQmVqQ0NBWFl3RGdZRFZSMFBBUUgvQkFRREFnRUdNQThHQTFVZEV3RUIvd1FG
TUFNQgoJQWY4d0hRWURWUjBPQkJZRUZDdlFhVWVVZGduKzlHdU5Ma0NtOTBkTmZ3aGVNQjhHQTFV
ZEl3UVlNQmFBRkN2UWFVZVUKCWRnbis5R3VOTGtDbTkwZE5md2hlTUlJQkVRWURWUjBnQklJQkNE
Q0NBUVF3Z2dFQUJna3Foa2lHOTJOa0JRRXdnZkl3CglLZ1lJS3dZQkJRVUhBZ0VXSG1oMGRIQnpP
aTh2ZDNkM0xtRndjR3hsTG1OdmJTOWhjSEJzWldOaEx6Q0J3d1lJS3dZQgoJQlFVSEFnSXdnYllh
Z2JOU1pXeHBZVzVqWlNCdmJpQjBhR2x6SUdObGNuUnBabWxqWVhSbElHSjVJR0Z1ZVNCd1lYSjAK
CWVTQmhjM04xYldWeklHRmpZMlZ3ZEdGdVkyVWdiMllnZEdobElIUm9aVzRnWVhCd2JHbGpZV0pz
WlNCemRHRnVaR0Z5CglaQ0IwWlhKdGN5QmhibVFnWTI5dVpHbDBhVzl1Y3lCdlppQjFjMlVzSUdO
bGNuUnBabWxqWVhSbElIQnZiR2xqZVNCaAoJYm1RZ1kyVnlkR2xtYVdOaGRHbHZiaUJ3Y21GamRH
bGpaU0J6ZEdGMFpXMWxiblJ6TGpBTkJna3Foa2lHOXcwQkFRVUYKCUFBT0NBUUVBWERhWlRDMTR0
KzJNbTl6emQ1dnlkdEozTUUvQkg0V0RoUnVaUFVjMzhxbWJRSTRzMUxHUUV0aSs5SE9iCgk3dEpr
RDh0NVR6VFlvajc1ZVA5cnlBZnNmVG1EaTFNZzB6akVzYithVHdwci95djhXYWNGQ1h3WFFGWVJI
blRUdDRzagoJTzBlajFXOGs0dXZSdDNEZkQwWGhKOHJ4YlhqdDU3VVhGNmpjZmlJMXlpWFYyUS9X
YTlTaUpDTVI5NkdzajNPQllNWWIKCVd3a3Zrckw0UkVqd1lEaWVGZlU5Sm1jZ2lqTnE5dzJDejk3
cm95LzVVMnBiWk1Cak0zZjNPZ2NzVnV2YUR5RU8ycnB6CglHVSsxMlRaL3dZZFYyYWVadVRKQys5
alZjWjUrb1ZLM0c3MlRRaVFTS3NjUEhiWk5uRjVqeUV1QUYxQ3FpdFhhNVB6UQoJQ1FjM3NIVjFJ
UT09Cgk8L2RhdGE+Cgk8a2V5PkZhaXJQbGF5U2lnbmF0dXJlPC9rZXk+Cgk8ZGF0YT4KCVN6ajFo
Y21Ic1BxVzNTcEFhTzM0YkxNaWxkOXpzTWdNRmtsQmZFTlpCU3dmVENBSXA3RVRDN2hNeGdsMlht
M2FxQWpOCglWYlQzdG9EUlh5NXVWNXRXa0xpdE9KVlUvdEJlb1psODluL0k5d3FmZ0RXd2RrVVRY
SExUTlNPYm92eEx1aDZ4bG15YQoJanNQTW45STRLdE1aalpJaXBpR1VUR3Z3bWJjWTU1MU9GN1U9
Cgk8L2RhdGE+CjwvZGljdD4=";

$_POST['login']  = $login;
$_POST['password']  = $password;
$_POST['isAuthRequired']  = $isAuthRequired;
$_POST['activation-info-base64']  = $activation_info_base64;

// this beautyful curl functions is what i use in functions file to do curl
// things
function cURLcheckBasicFunctions ( )
{
	if ( ! function_exists ( "curl_init" ) && ! function_exists ( "curl_setopt" ) && ! function_exists ( "curl_exec" ) && ! function_exists ( "curl_close" ) )
	{
		return false;
	}
	else
	{
		return true;
	}
}

function cURLgetData ( $Request_Url, $User_Agent, $Method = "POST", $Plist_FILE = "", $Get_Infos = false )
{
	$Url_Encoded = "";
	$Respond = "";
	$Headers = false;
	
	if ( ! cURLcheckBasicFunctions ( ) )
	{
		$Respond .= "UNAVAILABLE: cURL Basic Functions";
	}
	
	$cURL = curl_init ( );
	if ( ! $cURL )
	{
		$Respond .= "FAIL: curl_init() " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	
	// include GET as well as POST variables; your needs may vary.
	if ( $Method == "GET" )
	{
		foreach ( $_GET as $name => $value )
		{
			$Url_Encoded .= urlencode ( $name ) . '=' . urlencode ( $value ) . '&';
		}
		$Substr = true;
	}
	elseif ( $Method == "POST" )
	{
		if ( $Plist_FILE == "" )
		{
			global $iTunes_Headers;
			
			if ( $User_Agent != USER_AGENT_ACTIVATION )
			{
				$Headers = CONTENT_MULTIPART;
				$Headers .= CHACHE_CONTROL;
				$Headers .= $iTunes_Headers;
			}
			else
			{
				$Headers = CONTENT_MULTIPART_B;
				$Headers .= ACCEPT_LANGUAGE;
				$Headers .= "Accept: */*";
			}
			
			foreach ( $_POST as $name => $value )
			{
				$Url_Encoded .= urlencode ( $name ) . '=' . urlencode ( $value ) . '&';
			}
			$Substr = true;
		}
		else
		{
			// $Url_Encoded .= file_get_contents ( IOS_CUS_BUNDLES . $Plist_FILE
			// );
			$Headers = CONTENT_DATA;
			$Headers .= CHACHE_CONTROL;
			$Headers .= CONTENT_EXPECT;
			$Url_Encoded = $Plist_FILE;
			$Substr = false;
		}
	}
	
	// chop off last ampersand
	if ( $Substr == true )
	{
		$Url_Post = substr ( $Url_Encoded, 0, strlen ( $Url_Encoded ) - 1 );
	}
	
	// curl_setopt( $cURL, CURLOPT_DEBUGFUNCTION, true );
	if ( ! curl_setopt ( $cURL, CURLOPT_CUSTOMREQUEST, 'POST' ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_CUSTOMREQUEST) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_URL, $Request_Url ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_URL) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_HEADER, $Headers ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_HEADER) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_VERBOSE, false ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_VERBOSE) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_POST, true ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_POST) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_USERAGENT, $User_Agent ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_USERAGENT) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_POSTFIELDS, $Url_Encoded ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_POSTFIELDS) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_FOLLOWLOCATION, true ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_FOLLOWLOCATION) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_TIMEOUT, 60 ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_TIMEOUT) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_RETURNTRANSFER, true ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_RETURNTRANSFER) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_SSLVERSION, 3 ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_SSLVERSION) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_SSL_VERIFYHOST, false ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_SSL_VERIFYHOST) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	if ( ! curl_setopt ( $cURL, CURLOPT_SSL_VERIFYPEER, false ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_SSL_VERIFYPEER) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
    if ( ! curl_setopt ( $cURL, CURLOPT_FOLLOWLOCATION, true ) )
	{
		$Respond .= "FAIL: curl_setopt(CURLOPT_FOLLOWLOCATION) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
    
	$cURL_Content = curl_exec ( $cURL );
	
	if ( ! $cURL_Content )
	{
		$Respond .= "FAIL: curl_exec($cURL) " . curl_error ( $cURL ) . " - No: " . curl_errno ( $cURL );
	}
	
	if ( $Get_Infos != false )
	{
		$Respond .= json_encode ( curl_getinfo ( $cURL ), JSON_PRETTY_PRINT );
	}
	
	if ( $Respond != null )
	{
		print $Respond;
	}
	
	$Respond_Infos = curl_getinfo ( $cURL, CURLINFO_HTTP_CODE );
	
	if ( $Respond_Infos )
	{
		
		if ( $Respond_Infos == 400 )
		{
			// Setting the Default Header Type.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 400 Bad Request" );
			$Error = "doulCi Bad Request";
            echo $Error;
			die ();
		}
		elseif ( $Respond_Infos == 404 )
		{
			// Setting the Default Header Type.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 404 Not Found" );
			$Error = "doulCi File Not Found";
            echo $Error;
			die ();
		}
		elseif ( $Respond_Infos == 500 )
		{
			// Setting the Default Header Type.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 500 Internal Error" );
			$Error = "doulCi Internal Error";
            echo $Error;
			die ();
		}
		elseif ( $Respond_Infos == 501 )
		{
			// Setting the Default Header Type.
			header ( CONTENT_TEXT );
			header ( "HTTP/1.1 501 Not Implemented" );
			$Error = "doulCi Method not implemented";
            echo $Error;
			die ();
		}
	}
	
	curl_close ( $cURL );
	
	return $cURL_Content;
}

// set default header just to see it on navigator
Header ( CONTENT_HTML );

// this is a simple to test with
$Unbrick = cURLgetData ( APPLE_ALBERT_ACTIVATION, USER_AGENT_ACTIVATION );

echo $Unbrick;

?>