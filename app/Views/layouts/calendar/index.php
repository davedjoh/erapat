<body>
    <div class="row">
        <div id="contextMenu" class="dropdown clearfix"></div>
        <div class="panel panel-default hidden-print">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $title; ?></h3>

            </div>
            <div class="panel-body vertical-align">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="calendar_view">Pilih Mode Tampilan</label>
                        <select class="form-control" id="calendar_view">
                            <option value="month">Tampilkan Kalendar Berdasarkan Bulan</option>
                            <option value="agendaWeek">Tampilkan Kalendar Berdasarkan Minggu</option>
                            <option value="agendaDay">Tampilkan Kalendar Berdasarkan Hari</option>
                            <option value="listWeek">Tampilkan Kalendar Berdasarkan List Agenda Rapat</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="calendar_start_time">Jam Awal Rapat :</label>
                        <select class="form-control" id="calendar_start_time">
                            <?php get_dropdown_time(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="calendar_end_time">Jam Akhir Rapat :</label>
                        <select class="form-control" id="calendar_end_time">
                            <?php get_dropdown_time(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input class='showHideWeekend' type="checkbox" checked>
                        <label for="ShowWeekends">Tampilkan / Sembunyikan Akhir Pekan (Sabtu - Minggu)</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default hidden-print">
        <div class="panel-heading">
            <h3 class="panel-title">Filter Kalender</h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-5">
                <label for="calendar_view">Berdasarkan Media Meeting</label>
                <div class="input-group">
                    <select class="filter" id="type_filter" multiple="multiple">
                        <option value='all'>Semua Media Meeting</option>
                        <?php
                        echo "<option value='0' disabled>-- Media Online --</option>";
                        get_dropdown_media_online();
                        echo "<option value='0' disabled>-- Media Offline --</option>";
                        get_dropdown_media_offline();
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-5">
                <label for="calendar_view">Berdasarkan Esalon 2</label>
                <div class="input-group">
                    <select class="filter" id="bagian_filter" multiple="multiple">
                        <option value='all'>Semua Esalon 2</option>
                        <?= get_dropdown_esalon_2(); ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <label for="calendar_view">Berdasarkan Tipe Media</label>
                <div class="input-group">
                    <label class="checkbox-inline"><input class='filter' type="checkbox" value="Online" checked><span class="chksuccess">Media Online</span></label>
                    <label class="checkbox-inline"><input class='filter' type="checkbox" value="Offline" checked><span class="chkdanger">Media Offline</span></label>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="loading"></div>
        <div class="print-visible" id="calendar"></div>
    </div>

    <!-- DETAIL EVENT MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editEventModal" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Rapat Tanggal : <span class="eventDate"></span> Pukul <span class="eventHourStart"></span> s/d <span class="eventHourEnd"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="title">Nama Bagian</label>
                                    <input class="inputModal" disabled id="editTitle" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="edit-event-desc">Agenda Rapat</label>
                                    <textarea rows="4" cols="50" class="inputModal" disabled id="edit-event-desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="col-xs-4" for="edit-event-desc">Agenda Rapat</label>
                                <textarea rows="4" cols="50" class="inputModal" disabled id="edit-event-desc"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->