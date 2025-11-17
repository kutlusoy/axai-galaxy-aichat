# Local AI Server for WordPress AxAI Galaxy AIChat
Step-by-Step Guide
Ollama (with Cloud Models) + Docker + AnythingLLM (in Docker Container) + Caddy + WordPress Plugin (AxAI Galaxy AIChat)

## Windows

### Ollama Part:
1) Download and install "Ollama" for Windows from "https://ollama.com/download/windows"
2) Press Win + R keys, type cmd and press Enter
3) Enter command: ollama run kimi-k2-thinking:cloud
4) Open Ollama for Windows (GUI) and log in under Settings (or create an account).
5) Ollama Settings: Enable "Expose Ollama to the network"
6) Ollama Settings: Adjust "Context length" (maximum is always possible)
7) Optionally, set Ollama to start automatically on Windows startup

### Docker Part:
1) Download Docker for Windows and install according to instructions (https://docs.docker.com/desktop/setup/install/windows-install/)
2) Start Docker for Desktop and open Terminal in Docker

### AnythingLLM on Docker Part:
Info: https://docs.useanything.com/installation-docker/local-docker (choose Windows)
1) In Docker Terminal: docker pull mintplexlabs/anythingllm:latest
2) In Docker Terminal: Copy-paste-enter the entire command:

```
$env:STORAGE_LOCATION="$HOME\Documents\anythingllm"; `
If(!(Test-Path $env:STORAGE_LOCATION)) {New-Item $env:STORAGE_LOCATION -ItemType Directory}; `
If(!(Test-Path "$env:STORAGE_LOCATION\.env")) {New-Item "$env:STORAGE_LOCATION\.env" -ItemType File}; `
docker run -d -p 3001:3001 `
--cap-add SYS_ADMIN `
-v "$env:STORAGE_LOCATION`:/app/server/storage" `
-v "$env:STORAGE_LOCATION\.env:/app/server/.env" `
-e STORAGE_DIR="/app/server/storage" `
mintplexlabs/anythingllm;
```


### Caddy Part:
1) Install Caddyserver (https://caddyserver.com/download)
2) If an SSL certificate is required: https://zerossl.com/
3) Create Caddyfile content (without "Caddyfile" file extension) in "c:\caddy" and adjust domain etc. if necessary:

``` 
ai.axai.at:3002 {
    reverse_proxy localhost:3001 {
        # Remove all CORS headers from backend
        header_down -Access-Control-Allow-Origin
        header_down -Access-Control-Allow-Methods
        header_down -Access-Control-Allow-Headers
        header_down -Access-Control-Allow-Credentials
        
        # Forwarding headers for HTTPS
        header_up Host {http.request.host}
        header_up X-Real-IP {http.request.remote.host}
        header_up X-Forwarded-For {http.request.remote.host}
        header_up X-Forwarded-Proto https
        header_up X-Forwarded-Host {http.request.host}
    }
    
    tls C:\caddy\certs\mydomain_public.crt C:\caddy\certs\mydomain_private.key
    
    # Only Caddy sets CORS headers
    header {
        Access-Control-Allow-Origin "*"
        Access-Control-Allow-Methods "GET, POST, OPTIONS, PUT, DELETE"
        Access-Control-Allow-Headers "Content-Type, Authorization, X-Requested-With"
        Access-Control-Allow-Credentials "true"
    }
    
    # Respond to OPTIONS requests directly
    @options {
        method OPTIONS
    }
    respond @options 204
}
```


4) Copy the following files to the folders: "C:\caddy\certs\mydomain_public.crt" and "C:\caddy\certs\mydomain_private.key"
5) Run Command prompt (cmd) as Administrator and enter the following command:

```
sc.exe create caddy start= auto binPath= "c:\caddy\caddy.exe run"
```

### Router Part:
1) You must assign a fixed (internal) IP address to your computer (AnythingLLM computer) on your router.
2) Port forwarding Ollama "3001" (for internal use)
3) Port forwarding SSL-Server "3002" (for incoming external requests)

### Domain Part:
1) Create a subdomain (e.g. ai.mydomain.com) or get a subdomain via https://www.duckdns.org/domains.
2) Enter Type A DNS record for "ai.mydomain.com" pointing to your IP address.

### AnythingLLM Part:
1) Open localhost:3001
2) Create admin account
3) In Settings under AI Provider > LLM: Select Ollama as "LLM Provider" and choose "kimi-k2-thinking:cloud" as Ollama Model and save.
4) Create a new workspace
5) In Settings under Chat Embed, create a new embedding with your workspace and copy the ID.

### WordPress Part:
1) Download plugin
Github: https://github.com/kutlusoy/axai-galaxy-aichat
WordPress: https://wordpress.org/plugins/axai-galaxy-aichat
2) Install plugin
3) Enter configuration
- Workspace Embed ID = similar to 474b6fd8-1976-42fc-b66b-3f3xxxxxxx
- AI Server URL = https://ai.mydomain.com:3002
4) Save and enjoy AI Chat.
