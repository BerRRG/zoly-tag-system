<h1>Tagging Plan</h1>
<div>
    <div class="repeater-default">
        <div data-repeater-list="attribute" class="drag">
            <div type="hidden">
                @include('tag-book.partials.default-item-clone-web-attribute-item')
            </div>
            @foreach($webAttributes as $key => $webAttribute)
                <div data-repeater-item="">
                    <input type="hidden" value="{{$webAttribute->id}}" name="attribute[{{$key}}][id]">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][priority]', 'Priority') }}
                                {{ form::text('attribute['.$key.'][priority]', input::old('attribute['.$key.'][priority]') ? input::old('attribute['.$key.'][priority]') : $webAttribute->priority, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][reference_link_page]', 'Reference Link Page') }}
                                {{ form::text('attribute['.$key.'][reference_link_page]', input::old('attribute['.$key.'][reference_link_page]')? input::old('attribute['.$key.'][reference_link_page]') : $webAttribute->reference_link_page , array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][description_when]', 'Description (Quando)') }}
                                {{ form::text('attribute['.$key.'][description_when]', input::old('attribute['.$key.'][description_when]') ? input::old('attribute['.$key.'][description_when]') : $webAttribute->description_when, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][description_where]', 'Description (Onde)') }}
                                {{ form::text('attribute['.$key.'][description_where]', input::old('attribute['.$key.'][description_where]') ? input::old('attribute['.$key.'][description_where]') : $webAttribute->description_where, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][description_button]', 'Description (Titulo ou nome do botão/link)') }}
                                {{ form::text('attribute['.$key.'][description_button]', input::old('attribute['.$key.'][description_button]') ? input::old('attribute['.$key.'][description_button]') : $webAttribute->description_button, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][data_layer_data_attribute]', 'dataLayer ou data-attributes') }}
                                {{ form::select('attribute[0][data_layer_data_attribute]', $webAttribute->dataTypes, input::old('attribute[0][data_layer_data_attribute]') ? input::old('attribute[0][data_layer_data_attribute]') : $webAttribute->data_layer_data_attribute, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][data_layer_event]', 'dataLayer event(se necessario)') }}
                                {{ form::text('attribute['.$key.'][data_layer_event]', input::old('attribute['.$key.'][data_layer_event]') ? input::old('attribute['.$key.'][data_layer_event]') : $webAttribute->data_layer_event, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            {{ form::label('attribute['.$key.'][status_implemetation_data_layer_data_attribute]', 'Status Implementation dataLayer ou data-attributes', ['class' => ' col-2 text-truncate']) }}
                            {{ form::select('attribute['.$key.'][status_implemetation_data_layer_data_attribute]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_implemetation_data_layer_data_attribute]') ? input::old('attribute['.$key.'][status_implemetation_data_layer_data_attribute]') : $webAttribute->status_implementation_data_layer_data_attribute, array('class' => 'form-control')) }}
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][status_implementation_tag_manager]', 'Status Implementation TagManager') }}
                                {{ form::select('attribute['.$key.'][status_implementation_tag_manager]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_implementation_tag_manager]') ? input::old('attribute['.$key.'][status_implementation_tag_manager]') : $webAttribute->status_implementation_tag_manager, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][status_google_analytics]', 'Status Google Analytics') }}
                                {{ form::select('attribute['.$key.'][status_google_analytics]', $webAttribute->implementationStatus, input::old('attribute['.$key.'][status_google_analytics]') ? input::old('attribute['.$key.'][status_google_analytics]') : $webAttribute->status_google_analytics, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][track_type]', 'Track Type') }}
                                {{ form::select('attribute['.$key.'][track_type]', $webAttribute->trackType, input::old('attribute['.$key.'][track_type]') ? input::old('attribute['.$key.'][track_type]') : $webAttribute->track_type, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][tag_name]', 'Tag Name') }}
                                {{ form::text('attribute['.$key.'][tag_name]', input::old('attribute['.$key.'][tag_name]') ? input::old('attribute['.$key.'][tag_name]') : $webAttribute->tag_name, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][fields_to_set_no_interaction]', 'Fields to Set(noInteraction)') }}
                                {{ form::text('attribute['.$key.'][fields_to_set_no_interaction]', input::old('attribute['.$key.'][fields_to_set_no_interaction]') ? input::old('attribute['.$key.'][fields_to_set_no_interaction]') : $webAttribute->fields_to_set_no_interaction, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][fields_to_set_type]', 'Fields to Set(type)') }}
                                {{ form::select('attribute['.$key.'][fields_to_set_type]', $webAttribute->fieldSetTypes, input::old('attribute['.$key.'][fields_to_set_type]') ? input::old('attribute['.$key.'][fields_to_set_type]') : $webAttribute->fields_to_set_type, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][fields_to_set_example]', 'Fields to Set(example)') }}
                                {{ form::text('attribute['.$key.'][fields_to_set_example]', input::old('attribute['.$key.'][fields_to_set_example]') ? input::old('attribute['.$key.'][fields_to_set_example]') : $webAttribute->fields_to_set_example, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][event_category]', 'Event Category') }}
                                {{ form::text('attribute['.$key.'][event_category]', input::old('attribute['.$key.'][event_category]') ? input::old('attribute['.$key.'][event_category]') : $webAttribute->event_category, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][event_action]', 'Event Action') }}
                                {{ form::text('attribute['.$key.'][event_action]', input::old('attribute['.$key.'][event_action]') ? input::old('attribute['.$key.'][event_action]') : $webAttribute->event_action, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][event_label_var]', 'Event Label/Var') }}
                                {{ form::text('attribute['.$key.'][event_label_var]', input::old('attribute['.$key.'][event_label_var]') ? input::old('attribute['.$key.'][event_label_var]') : $webAttribute->event_label_var, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][event_value]', 'Event Value') }}
                                {{ form::text('attribute['.$key.'][event_value]', input::old('attribute['.$key.'][event_value]') ? input::old('attribute['.$key.'][event_value]') : $webAttribute->event_value, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <h2>Custom Dimensions</h2>
                        <div class="dimension-repeater">
                          <div data-repeater-list="attribute-dimensions" class="drag">
                            @foreach( $webAttribute->dimensions()->get() as $dimensionKey => $dimension)
                             <div data-repeater-item="">
                                <input type="hidden" value="{{$dimension->id}}" name="attribute[{{$key}}][dimension][{{$dimensionKey}}][id]">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][dimensions]['.$dimensionKey.'][label]', 'Descrição') }}
                                            {{ form::text('attribute['.$key.'][dimensions]['.$dimensionKey.'][label]', input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][label]') ? input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][label]') : $dimension->label, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][dimensions]['.$dimensionKey.'][variable]', 'Variável') }}
                                            {{ form::text('attribute['.$key.'][dimensions]['.$dimensionKey.'][variable]', input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][variable]') ? input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][variable]') : $dimension->variable, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][dimensions]['.$dimensionKey.'][name]', 'Exemplo') }}
                                            {{ form::text('attribute['.$key.'][dimensions]['.$dimensionKey.'][name]', input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][name]') ? input::old('attribute['.$key.'][dimensions]['.$dimensionKey.'][name]') : $dimension->name, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-remove"></span> Delete
                                        </span>
                                    </div>
                               </div>
                             </div>
                           @endforeach
                          </div>
                         <hr>
                            <div class="row form-group">
                              <div class="col-sm-11">
                              <span data-repeater-create="" class="btn btn-info btn-md">
                                  <span class="glyphicon glyphicon-plus"></span> Add
                              </span>
                              </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][additional]', 'Additional') }}
                                {{ form::text('attribute['.$key.'][additional]', input::old('attribute['.$key.'][additional]') ? input::old('attribute['.$key.'][additional]') : $webAttribute->additional, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>

                    <h2>Comentarios</h2>
                        <div class="inner-repeater">
                          <div data-repeater-list="attribute-comments" class="drag">
                            @foreach( $webAttribute->comments()->get() as $commentKey => $comment)
                            <div data-repeater-item="">
                                <input type="hidden" value="{{$comment->id}}" name="attribute[{{$key}}][comments][{{$commentKey}}][id]">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][variable]', 'Variável') }}
                                            {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][variable]', input::old('attribute['.$key.'][comments]['.$commentKey.'][variable]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][variable]') : $comment->variable, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][example]', 'Exemplo') }}
                                            {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][example]', input::old('attribute['.$key.'][comments]['.$commentKey.'][example]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][example]') : $comment->example, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][description]', 'Descrição') }}
                                            {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][description]', input::old('attribute['.$key.'][comments]['.$commentKey.'][description]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][description]') : $comment->description, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {{ form::label('attribute['.$key.'][comments]['.$commentKey.'][note]', 'Observação') }}
                                            {{ form::text('attribute['.$key.'][comments]['.$commentKey.'][note]', input::old('attribute['.$key.'][comments]['.$commentKey.'][note]') ? input::old('attribute['.$key.'][comments]['.$commentKey.'][note]') : $comment->note, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-2">
                                        <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-remove"></span> Delete
                                        </span>
                                    </div>
                               </div>
                           </div>
                           @endForeach
                         </div>
                         <hr>
                        <div class="row form-group">
                          <div class="col-sm-11">
                          <span data-repeater-create="" class="btn btn-info btn-md">
                              <span class="glyphicon glyphicon-plus"></span> Add
                          </span>
                          </div>
                        </div>
                       </div>
                   <h2>Seção</h2>
                   <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ form::label('attribute['.$key.'][section]', 'Section') }}
                                {{ form::text('attribute['.$key.'][section]', input::old('attribute['.$key.'][Section]') ? input::old('attribute['.$key.'][Section]') : $webAttribute->section, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <span data-repeater-delete="" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-remove"></span> Delete
                            </span>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>

        <div class="row form-group">
            <div class="col-sm-11">
                <span data-repeater-create="" class="btn btn-info btn-md">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </span>
            </div>
        </div>
    </div>
</div>
