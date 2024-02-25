export default function sanitizeString(str) {
    // Remove script tags and their content
    str = str.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, "");

    // Remove HTML tags
    str = str.replace(/<[^>]*>/g, "");

    return str;
}
