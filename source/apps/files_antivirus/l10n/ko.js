OC.L10N.register(
    "files_antivirus",
    {
    "Clean" : "안전함",
    "Infected" : "감염됨",
    "Unchecked" : "검사되지 않음",
    "Scanner exit status" : "스캐너 종료 상태",
    "Scanner output" : "스캐너 출력",
    "Saving…" : "저장 중…",
    "Antivirus" : "안티바이러스",
    "File {file} is infected with {virus}" : "파일 {file}이(가) {virus}에 감염됨",
    "The file has been removed" : "파일이 삭제됨",
    "File containing {virus} detected" : "{virus}에 감염된 파일 탐지됨",
    "Antivirus detected a virus" : "안티바이러스 도구에서 바이러스를 탐지함",
    "Virus %s is detected in the file. Upload cannot be completed." : "파일에 %s 바이러스가 감지되었습니다. 업로드할 수 없습니다.",
    "Saved" : "저장됨",
    "Antivirus for files" : "파일 안티바이러스",
    "An antivirus app for Nextcloud" : "Nextcloud용 안티바이러스 앱",
    "Antivirus for files is an antivirus app for Nextcloud.\n\n* 🕵️‍♂️ When the user uploads a file, it's checked\n* ☢️ Uploaded and infected files will be deleted and a notification will be shown and/or sent via email\n* 🔎 Background Job to scan all files\n* ❓ Use ClamAV (open source), Kaspersky Scan Engine or an ICAP compatible scanner\n\nThis application inspects files that are uploaded to Nextcloud for viruses before they are written to the Nextcloud storage. If a file is identified as a virus, it is either logged or not uploaded to the server. The application relies on the underlying ClamAV virus scanning engine, which the admin points Nextcloud to when configuring the application. Alternatively, a Kaspersky Scan Engine can be configured, which has to run on a separate server.\nFor this app to be effective, the ClamAV virus definitions should be kept up to date. Also note that enabling this app will impact system performance as additional processing is required for every upload. More information is available in the Antivirus documentation." : "Antivirus for files는 Nextcloud용 안티바이러스 앱입니다.\n\n* 🕵️‍♂️ 사용자가 파일을 업로드할 때 해당 파일을 검사합니다\n* ☢️ 업로드한 파일이 바이러스에 감염되었을 경우 이를 삭제하며, 알림과 이메일을 통해 이 사실을 전달합니다\n* 🔎 백그라운드 작업을 통해 모든 파일을 검사합니다\n* ❓ Clam AV (오픈소스), Kaspersky Scan Engine, 또는 ICAP 호환 검사기를 사용합니다\n\n이 애플리케이션은 Nextcloud에 업로드된 파일이 저장소에 저장되기 전 바이러스를 검사합니다. 바이러스로 식별될 경우, 파일은 서버에 업로드되지 않으며 이는 로그에 기록됩니다. 앱은 관리자의 설정에 따라 내장 ClamAV 바이러스 검사 엔진 또는 Kaspersky Scan Engine을 기반으로 작동됩니다.\n앱의 원활한 동작을 위해, ClamAV 바이러스 정의 목록은 최신 상태를 유지해야 합니다. 또한 사용자의 모든 업로드에 대해 추가적인 작업이 필요하므로, 시스템 성능에 영향을 미칠 수 있습니다. 더 많은 정보는 Antivirus 앱 문서를 참조하십시오.",
    "Greetings {user}," : "안녕하세요 {user}님,",
    "Sorry, but a malware was detected in a file you tried to upload and it had to be deleted." : "죄송하지만 업로드하려고 하는 파일에서 멀웨어가 감지되어 삭제되었습니다.",
    "This email is a notification from {host}. Please, do not reply." : "이 이메일은 {host}에서 자동으로 전송한 알림 이메일입니다. 답장하지 마십시오.",
    "File uploaded: {file}" : "업로드한 파일: {file}",
    "Antivirus for Files" : "파일 안티바이러스",
    "Mode" : "모드",
    "ClamAV Executable" : "ClamAV 사용 가능",
    "ClamAV Daemon" : "ClamAV 데몬",
    "ClamAV Daemon (Socket)" : "ClamAV 데몬 (소켓)",
    "Kaspersky Daemon" : "Kaspersky 데몬",
    "ICAP server" : "ICAP 서버",
    "Socket" : "소켓",
    "ClamAV Socket." : "ClamAV 소켓.",
    "Not required in Executable Mode." : "실행 파일 모드에서는 필요하지 않습니다.",
    "Host" : "호스트",
    "Address of Antivirus Host." : "안티바이러스 호스트 주소입니다.",
    "Port" : "포트",
    "Port number of Antivirus Host." : "안티바이러스 호스트의 포트입니다.",
    "TLS" : "TLS",
    "Use TLS encryption." : "TLS 암호화 사용.",
    "ICAP preset" : "ICAP 프리셋",
    "Select" : "선택",
    "ICAP mode" : "ICAP 모드",
    "ICAP service" : "ICAP 서비스",
    "ICAP virus response header" : "ICAP 바이러스 응답 헤더",
    "Stream Length" : "스트림 길이",
    "ClamAV StreamMaxLength value in bytes." : "바이트 단위 ClamAV StreamMaxLength 값입니다.",
    "bytes" : "바이트",
    "Path to clamscan" : "clamscan 경로",
    "Path to clamscan executable." : "clamscan 실행 파일 경로입니다.",
    "Not required in Daemon Mode." : "데몬 모드에서는 필요하지 않습니다.",
    "Extra command line options (comma-separated)" : "추가 명령행 옵션(쉼표로 구분)",
    "When infected files are found during a background scan" : "백그라운드 검사 시 감염된 파일을 찾았을 때",
    "Only log" : "로그만",
    "Delete file" : "파일 삭제",
    "Save" : "저장",
    "Advanced" : "고급",
    "Rules" : "규칙",
    "Clear All" : "모두 비우기",
    "Reset to defaults" : "기본값으로 초기화",
    "Match by" : "일치 기준",
    "Scanner exit status or signature to search" : "스캐너 종료 상태나 검색할 시그니처",
    "Description" : "설명",
    "Mark as" : "다음으로 표시",
    "Add a rule" : "규칙 추가"
},
"nplurals=1; plural=0;");