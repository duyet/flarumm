System.register('locale', [], function() {
    return {
        execute: function() {
            app.translator.translations = {"core":{"log_out":"Log Out"}};
app.translator.plural = function(count) {
  return count == 1 ? 'one' : 'other';
};
}
    };
});