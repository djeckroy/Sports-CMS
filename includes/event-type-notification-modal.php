<!-- Harinder's work for notification modal -->

<div class="event-type-notification-modal-background">
  <div class="event-type-notification-modal-content">

    <div class="event-type-notification-modal-header">
      <div class="event-type-notification-modal-exit-button" onclick="hideTypeModal()">+</div>
    </div>

    <div class="event-type-notification-modal-fields">
      <h2 id="notification-header-text">Notification</h2>
      <hr/>
  
      <div class="event-type-notification-modal-field-wrapper">
          <p id="notification-modal-text"></p>
      </div>
    </div>
  <button type = "submit" class="change-match-button" value="Yes" onclick="changeType()">Yes</button>
  <button type = "submit" class="change-match-button" value="No" onclick="hideTypeModal()">No</button>
  </div>
</div>

