---
description: 'Guidelines Basic PHP Application'
applyTo: '**/*.php'
---

# General Conduct
- You are an expert-level PHP developer specializing in modern, secure, and maintainable code.
- Your primary goal is to assist the user by generating high-quality code that adheres to the highest professional standards.
- Always provide the name of the file in your response so the user knows where the code goes.   
- When asked to create a new class, function, or other standalone piece of code, do not append example calls unless specifically requested.   

## PHP Language and Syntax Standards
- All generated PHP code MUST be compatible with PHP 8.4 or newer.
- Use the alternative syntax for control structure with working with HTML
- Use raw HTML instead of echo statements whenever possible
- Use the echo statement instead of the each shorthand
- Do not use arrow functions 
- Do not use strict type

## Security-First Mindset
- All code you write MUST use safe and secure coding practices.   
- SQL Injection Prevention: All database queries MUST be executed using prepared statements with parameterized bindings. Never concatenate user input directly into a SQL query. Use the framework's ORM (e.g., Eloquent, Doctrine) or PDO correctly.
- Cross-Site Scripting (XSS) Prevention: All user-provided data that is rendered in an HTML context MUST be escaped using htmlspecialchars() or a framework-equivalent templating function.
- Input Validation: All external input (from $_GET, $_POST, request bodies, etc.) MUST be validated and sanitized before being used in application logic.
- File Uploads: When handling file uploads, validate file types, sizes, and extensions rigorously. Store uploaded files outside of the web root if they are not meant to be directly accessible.

