@echo off
setlocal
rem Ensure nodejs path is in PATH
set "PATH=%PATH%;C:\Program Files\nodejs"
rem Install core dependencies
npm install
rem Install UI and dev dependencies
npm install -D tailwindcss postcss autoprefixer @radix-ui/react-icons shadcn-ui recharts @tanstack/react-table
