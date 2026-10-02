# Lion Fingerprint

Developer resources, API documentation, and sample code for integrating **Lion Fingerprint Time Recorder & Cloud Attendance Machines**.

<img width="598" height="624" alt="Lion F1 Fingerprint Time Recorder" src="https://github.com/user-attachments/assets/edc74354-4846-41be-9a58-ea0963873d4d" />

## Communication Methods

There are **three main ways** to communicate with Lion Fingerprint machines:

### 1. Direct LAN HTTP REST API

Communicate directly with a fingerprint machine through its local HTTP REST API.

* The computer/server and fingerprint machine must be on the **same local network**.
* Suitable for local attendance systems and real-time device management.
* No internet connection is required.

### 2. Retrieve Data from Lion Cloud

Retrieve attendance and device data through the **Lion Cloud API**.

* Devices upload/synchronize data to the Lion Cloud.
* Applications can retrieve synchronized data remotely.
* Suitable for centralized attendance management and multi-device deployments.

### 3. Device → Custom Server Synchronization

Configure a custom **Sync URL** in the fingerprint machine.

The machine will periodically send/upload its data to the configured server.

```text
Lion Fingerprint Machine
          │
          │ HTTP POST
          ▼
     Your Server
          │
          ▼
     Your Database
```

This method allows developers to build their own cloud backend and integrate Lion Fingerprint machines with existing systems.

## Repository Contents

This repository contains documentation and sample implementations for all three communication methods:

* LAN HTTP REST API
* Lion Cloud API
* Custom Sync Server
* Device communication examples
* Request/response examples
* API endpoints and parameters
* Sample server-side implementations
* Integration examples

## Getting Started

Choose the communication method that best fits your application:

| Method              | Internet Required | Same LAN Required | Custom Server |
| ------------------- | ----------------: | ----------------: | ------------: |
| Direct LAN REST API |                No |               Yes |            No |
| Lion Cloud API      |               Yes |                No |            No |
| Custom Sync URL     |               Yes |                No |           Yes |

## Purpose

The goal of this repository is to provide developers with the information and sample code required to integrate **Lion Fingerprint Time Recorder machines** into their own attendance, HR, payroll, ERP, and other software systems.

> **Note:** API availability and device functionality may vary depending on the Lion Fingerprint model and firmware version.
