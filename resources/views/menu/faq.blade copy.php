@extends('master.master')

@section('content')
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Container-->
				<div class="container-xxl d-flex flex-grow-1 flex-stack">
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::FAQ card-->
							<div class="card">
								<!--begin::Body-->
								<div class="card-body p-lg-15">
									<!--begin::Classic content-->
									<div class="mb-13">
										<!--begin::Intro-->
										<div class="mb-15">
											<!--begin::Title-->
											<h4 class="fs-2x text-gray-800 w-bolder mb-6">Pertanyaan yang Sering Diajukan (FAQ)</h4>
											<!--end::Title-->
											<!--begin::Text-->
											<p class="fw-semibold fs-4 text-gray-600 mb-2">
												Berikut adalah beberapa pertanyaan seputar layanan peminjaman buku online Perpustakaan CiroBooks.
											</p>											
											<!--end::Text-->
										</div>
										<!--end::Intro-->
										<!--begin::Row-->
										<div class="row mb-12">
											<!--begin::Col-->
											<div class="col-md-6 pe-md-10 mb-10 mb-md-0">
												<!--begin::Title-->
												<h2 class="text-gray-800 fw-bold mb-4">Peminjaman Buku</h2>
												<!--end::Title-->
												<!--begin::Accordion-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara meminjam buku?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_4_1" class="collapse show fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															1. Login ke akun siswa<br>
															2. Cari buku yang ingin dipinjam<br>
															3. Klik "Pinjam Buku"<br>
															4. Tunggu konfirmasi dari admin (maks 1x24 jam)<br>
															5. Ambil buku di perpustakaan setelah status "Disetujui"
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_2">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana melihat tanggal pengembalian?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_4_2" class="collapse fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															Setelah peminjaman disetujui, Anda dapat melihat:<br>
															1. Tanggal pengembalian di dashboard akun<br>
															2. Notifikasi email/SMS 3 hari sebelum jatuh tempo<br>
															3. Masa pinjam standar 7 hari (dapat diperpanjang)
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_3">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Berapa maksimal buku yang bisa dipinjam?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_4_3" class="collapse fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															Siswa dapat meminjam maksimal:<br>
															- 2 buku fiksi<br>
															- 3 buku non-fiksi<br>
															Total maksimal 5 buku dalam waktu bersamaan
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_4">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana cara memperpanjang pinjaman?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_4_4" class="collapse fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															1. Buka menu "Peminjaman Aktif"<br>
															2. Pilih buku yang ingin diperpanjang<br>
															3. Klik "Perpanjang Peminjaman"<br>
															4. Admin akan memverifikasi (1x24 jam)<br>
															5. Maksimal 1x perpanjangan (3 hari tambahan)
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
												</div>
												<!--end::Section-->
												<!--end::Accordion-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 ps-md-10">
												<!--begin::Title-->
												<h2 class="text-gray-800 fw-bold mb-4">Pengembalian & Denda</h2>
												<!--end::Title-->
												<!--begin::Accordion-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_1">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Apa syarat pengembalian buku?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_5_1" class="collapse show fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															- Buku dalam kondisi baik<br>
															- Tidak ada halaman yang rusak/robek<br>
															- Dilengkapi kartu peminjam<br>
															- Dikembalikan ke petugas perpustakaan
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_2">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Berapa denda keterlambatan?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_5_2" class="collapse fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															Denda dihitung per buku:<br>
															- Rp2.000/hari untuk buku umum<br>
															- Rp5.000/hari untuk buku referensi<br>
															Maksimal denda Rp50.000/buku
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_3">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duotone ki-plus-square toggle-off fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Icon-->
														<!--begin::Title-->
														<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Bagaimana jika buku hilang/rusak?</h4>
														<!--end::Title-->
													</div>
													<!--end::Heading-->
													<!--begin::Body-->
													<div id="kt_job_5_3" class="collapse fs-6 ms-1">
														<!--begin::Text-->
														<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">
															- Laporkan segera ke petugas perpustakaan<br>
															- Ganti buku yang sama edisi terbaru<br>
															- Atau bayar 2x harga buku + denda (jika ada)
														</div>
														<!--end::Text-->
													</div>
													<!--end::Content-->
													<!--begin::Separator-->
													<div class="separator separator-dashed"></div>
													<!--end::Separator-->
												</div>
												<!--end::Section-->
												<!--begin::Section-->
												<div class="m-0">
													<!--begin::Heading-->
													<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_4">
														<!--begin::Icon-->
														<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
															<i class="ki-duotone ki-minus-square toggle-on text-primary fs-1">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
															<i class="ki-duot