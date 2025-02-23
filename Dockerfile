FROM debian:bullseye-slim

# Install dependencies required for WordOps
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    wget \
    jq \
    lsb-release \
    ca-certificates \
    gnupg \
    sudo \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set entrypoint to keep container running
CMD ["tail", "-f", "/dev/null"]
