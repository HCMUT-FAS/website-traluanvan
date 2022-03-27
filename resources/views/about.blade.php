@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <dt>THÔNG TIN VỀ TRANG WEB</dt>
                </h2>
                <div class="card">
                    <div class="card-body">
                        <dl>
                            <h4>
                                <dt>Hệ Thống Quản Lý Luận Văn</dt>
                            </h4>
                            <dd><strong>Hệ Thống Quản Lý Luận Văn</strong> được tạo ra để giúp cho sinh viên của Đại Học
                                Bách Khoa có thể
                                mượn trả luận văn ở thư viện một cách dễ dàng và thuận tiện hơn.</dd>
                            <dt>Chức năng:</dt>
                            <ul>
                                <li>Giúp cho sinh viên tạo đơn mượn trước luận văn.</li>
                                <li>Quá trình thủ tục dễ dàng.</li>
                                {{-- <li>Thông báo khi hết hạn.</li> --}}
                                <li>Quản lý kho luận văn ở trường Đại Học Bách Khoa.</li>
                            </ul>
                            <h5>Người Sáng Lập</h5>
                            <dd>Người thiết kế website là <strong>Bùi An Khang</strong> - thuộc FAS-HCMUT</dd>
                            <ul>
                                <li><i aria-hidden="true" class="fa fa-envelope"></i><a
                                        href="mailto:khang.bui13032001@hcmut.edu.vn"> Email</a></li>
                                <li><i class="fab fa-github" aria-hidden="true"></i><a
                                        href="https://github.com/Achicken7301"> Github</a></li>
                            </ul>
                            <dd>Với sự giúp đỡ của thầy <strong>Lê Quốc Khải</strong> trong việc lên ý tưởng và giám sát.
                            </dd>
                            <ul>
                                <li><i aria-hidden="true" class="fa fa-envelope"></i><a href="mailto:quockhai@hcmut.edu.vn">
                                        Email</a></li>
                            </ul>
                            <h5>Phản Hồi</h5>
                            <dd>Nếu có đóng góp hay thắc mắc thì các bạn có thể điền vào <a
                                    href="https://docs.google.com/forms/d/e/1FAIpQLSdgt2JgNJ8sbFrITXqg-xK8PlHhEYR4SDI-B3oOHbXHUQvZrg/viewform?embedded=true">đây</a>
                                !</dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection
