// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('id', {
  defaultMessage: "Isian salah",
  type: {
    email:        "Email salah",
    url:          "URL salah",
    number:       "Isian harus berupa nomor",
    integer:      "Isian harus berupa bilangan bulat",
    digits:       "Isian harus berupa angka",
    alphanum:     "Isian harus berupa alfanumerik"
  },
  notblank:       "Isian tidak boleh kosong",
  required:       "Isian harus diisi",
  pattern:        "Isian salah",
  min:            "Isian harus lebih besar atau sama dengan %s.",
  max:            "Isian harus lebih kecil atau sama dengan %s.",
  range:          "Isian harus dalam rentang %s dan %s.",
  minlength:      "Isian terlalu pendek, minimal %s karakter atau lebih.",
  maxlength:      "Isian terlalu panjang, maksimal %s karakter atau kurang.",
  length:         "Panjang karakter isian harus dalam rentang %s dan %s",
  mincheck:       "Pilih minimal %s pilihan",
  maxcheck:       "Pilih maksimal %s pilihan",
  check:          "Pilih antar %s dan %s pilihan",
  equalto:        "Isian harus sama"
});

Parsley.setLocale('id');
