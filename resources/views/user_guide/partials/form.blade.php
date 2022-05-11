@csrf
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                           <label for="heading">Heading</label>
                           <input id="heading" type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" 
                           value="@isset($create) {{ old('heading') }} @endisset @isset($content) {{ $content->heading }} @endisset" aria-describedby="heading">
                           @error('heading')
                           <span class="invalid-feedback" role="alert">
                            {{ $message }}
                           </span>
                           @enderror
                         </div> 
                        
                          <div class="mb-3">
                          <label for="summernote">Body</label>
                          <textarea id="summernote" name="body">
                            @isset($create) {{ old('body') }} @endisset @isset($content) {{ $content->body }} @endisset
                          </textarea>

                          @error('body')
                          <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                          @enderror
                          </div>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>