int decrypt(char *out, const char* in, int inlen, const char* key)
{
  int outlen, tmplen;

  EVP_CIPHER_CTX ctx;
  EVP_CIPHER_CTX_init(&ctx);

  EVP_DecryptInit_ex(&ctx, EVP_bf_ecb(), NULL, NULL, NULL);
  EVP_CIPHER_CTX_set_padding(&ctx, 0);
  EVP_DecryptInit_ex(&ctx, NULL, NULL, (unsigned char *)key, NULL);

  if(!EVP_DecryptUpdate(&ctx, (unsigned char *)out, &outlen, (const unsigned char *)in, inlen))
  {
    ERR_print_errors_fp(stderr);
    return 0;
  }

  if(!EVP_DecryptFinal_ex(&ctx, (unsigned char *)out + outlen, &tmplen))
  {
    ERR_print_errors_fp(stderr);
    return 0;
  }

  EVP_CIPHER_CTX_cleanup(&ctx);

  outlen += tmplen;
  return outlen;
}