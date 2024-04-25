{{-- 予約フォーム --}}
<div class="page" id="page2">
  <div class="row mt-4">
      <div class="col-md-12">
          <h2>予約フォーム</h2>
          <form action="{{ route('rbooking.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="restaurant_post_id" value="{{ $restaurant->id }}">
              <div class="form-group">
                  <label for="day">希望日:</label>
                  <input type="date" id="day" name="day" class="form-control" value="#" required>
              </div>
              <div class="form-group">
                  <label for="time1">第一希望時間:</label>
                  <select id="time1" name="time1" class="form-control" required>
                      <option value="">-- 時間を選択してください --</option>
                      <optgroup label="朝 (6:00 - 11:59)">
                          @for ($hour = 6; $hour < 12; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="昼 (12:00 - 17:59)">
                          @for ($hour = 12; $hour < 18; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="夕方 (18:00 - 21:59)">
                          @for ($hour = 18; $hour < 22; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="夜 (22:00 - 23:59)">
                          @for ($hour = 22; $hour < 24; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                  </select>
              </div>
              
              <div class="form-group">
                  <label for="time2">第二希望時間:</label>
                  <select id="time2" name="time2" class="form-control" required>
                      <option value="">-- 時間を選択してください --</option>
                      <optgroup label="朝 (6:00 - 11:59)">
                          @for ($hour = 6; $hour < 12; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="昼 (12:00 - 17:59)">
                          @for ($hour = 12; $hour < 18; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="夕方 (18:00 - 21:59)">
                          @for ($hour = 18; $hour < 22; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                      <optgroup label="夜 (22:00 - 23:59)">
                          @for ($hour = 22; $hour < 24; $hour++)
                              <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                          @endfor
                      </optgroup>
                  </select>
              </div>
              
              <div class="form-group">
               <label for="number_guests">ゲスト人数:</label>
               <select id="number_guests" name="number_guests" class="form-control" required>
                   <option value="">-- 選択してください --</option>
                   <option value="1">1人</option>
                   <option value="2">2人</option>
                   <option value="3">3人</option>
                   <option value="4">4人</option>
                   <option value="5">5人</option>
                   <option value="6">6人</option>
                   <option value="7">7人</option>
                   <option value="8">8人</option>
                   <option value="9">9人</option>
                   <option value="10">10人以上</option>
               </select>
           </div>

              
              <div class="form-group">
                  <label for="memo">メモ:</label>
                  <textarea id="memo" name="memo" class="form-control"></textarea>
              </div>
              
              <button type="submit" class="btn btn-primary">予約する</button>
          </form>
      </div>
  </div>
</div>